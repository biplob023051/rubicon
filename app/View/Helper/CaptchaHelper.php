<?php
/**
 * PHP5 / CakePHP1.3
 *
 * @author        Mark Scherer
 * @link          http://www.dereuromark.de
 * @package       tools plugin
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * works togehter with captcha behaviour/component
 * 2011-06-11 ms
 */
App::uses('AppHelper', 'View/Helper');

class CaptchaHelper extends AppHelper {
	public $helpers = array('Form');

	protected $defaults = array(
		'difficulty' => 0, # initial diff. level (@see operator: + = 0, +- = 1, +-* = 2)
		'raiseDifficulty' => 2, # number of failed trails, after the x. one the following one it will be more difficult
	);
	public $settings = null;

	protected $numberConvert = null;
	protected $operatorConvert = null;
	
	function __construct(View $View, $settings = array()) {
		parent::__construct($View, $settings);

		# First of all we are going to set up an array with the text equivalents of all the numbers we will be using.
		$this->numberConvert = array(0=>'null', 1=>__('eins', true), 2=>__('zwei', true), 3=>__('drei', true), 4=>__('vier', true), 5=>__('fünf', true), 6=>__('sechs', true), 7=>__('sieben', true), 8=>__('acht', true), 9=>__('neun', true), 10=>__('zehn', true));

		# Set up an array with the operators that we want to use. With difficulty=1 it is only subtraction and addition.
		//$this->operatorConvert = array(0=>array('+','plus'), 1=>array('-','minus'), 2=>'*',__('calcTimes', true));
		$this->operatorConvert = array(0=>array('+',__('plus', true)), 1=>array('-',__('minus', true)), 2=>'*',__('calcTimes', true));

		App::import('Lib', 'CaptchaLib');
		$this->settings = array_merge(CaptchaLib::$defaults, $this->defaults);
		$settings = (array)Configure::read('Captcha');
		if (!empty($settings)) {
			$this->settings = array_merge($this->settings, $settings);
		}

	}


	/**
	 * //TODO: move to Lib
	 * shows the statusText of Relations
	 * @param int $difficulty: not build in yet
	 * 2008-12-12 ms
	 */
	protected function generate($difficulty = null) {
		# Choose the first number randomly between 6 and 10. This is to stop the answer being negative.
		$numberOne = mt_rand(6, 10);
		# Choose the second number randomly between 0 and 5.
		$numberTwo = mt_rand(1, 5);
		# Choose the operator randomly from the array.
		$captchaOperatorSelection = $this->operatorConvert[mt_rand(0, 1)];
		$captchaOperator = $captchaOperatorSelection[mt_rand(0, 1)];

		# Get the equation in textual form to show to the user.
		$code = (mt_rand(0, 1) == 1 ? __($this->numberConvert[$numberOne], true) : $numberOne) . ' ' . $captchaOperator . ' ' . (mt_rand(0, 1) == 1 ? __($this->numberConvert[$numberTwo], true) : $numberTwo);

		# Evaluate the equation and get the result.
		eval('$result = ' . $numberOne . ' ' . $captchaOperatorSelection[0] . ' ' . $numberTwo . ';');

		return array('code'=>$code, 'result'=>$result);
	}

	/**
	 * main captcha output (usually called from $this->input() automatically)
	 * - hash-based
	 * - session-based (not impl.)
	 * - db-based (not impl.)
	 * 2009-12-18 ms
	 */
	public function captcha($model = null) {
		$captchaCode = $this->generate();

		# Session-Way (only one form at a time) - must be a component then
	//$this->Session->write('Captcha.result', $result);

	# DB-Way (several forms possible, high security via IP-Based max limits)
	// the following should be done in a component and passed to the view/helper
	// $Captcha = ClassRegistry::init('Captcha');
	// $this->Captcha->new(); $this->Captcha->update(); etc

		# Timestamp-SessionID-Hash-Way (several forms possible, not as secure)
		$hash = $this->buildHash($captchaCode);

		$return = '';

		if (in_array($this->settings['type'], array('active', 'both'))) {
			# //todo obscure html here?
			$fill = ''; //'<span></span>';
			$return .= '<span id="captchaCode">'.$fill.''.$captchaCode['code'].'</span>';
		}

		$field = $this->__fieldName($model);

		# add passive part on active forms as well
		$return .= '<div style="display:none">'.
			$this->Form->input($field.'_hash', array('value'=>$hash)).
			$this->Form->input($field.'_time', array('value'=>time())).
			$this->Form->input((!empty($model)?$model.'.':'').$this->settings['dummyField'], array('value'=>'')).
		'</div>';
		return $return;
	}


	/**
	 * active math captcha
	 * either combined with between=true (all in this one funtion)
	 * or seperated by =false (needs input(false) and captcha() calls then)
	 * @param bool between: [default: true]
	 * 2010-01-08 ms
	 */
	public function input($model = null, $options = array()) {
		$defaultOptions = array(
			'type'=>'text',
			'class'=>'captcha',
			'value'=>'',
			'maxlength'=>3,
			'label'=>'<span class="hint">'.__('Anti-Spam-Schutz', true).'</span><br />'.__('* Wieviel ergibt', true),
			'combined'=>true,
			'autocomplete'=>'off',
            'style' => 'width: 20px;margin-top:14px;'

		);
		$options = array_merge($defaultOptions, $options);

		if ($options['combined'] === true) {
			$options['between'] = $this->captcha($model);
			if (in_array($this->settings['type'], array('active', 'both'))) {
				$options['between'] .= ' = ';
			}
		}
		unset($options['combined']);

		$field = $this->__fieldName($model);
		return $this->Form->input($field.'', $options); // TODO: rename: _code
	}

	/**
	 * passive captcha
	 * 2010-01-08 ms
	 */
	public function passive($model = null, $options = array()) {
		return $this->captcha($model);
	}

	/**
	 * active captcha
	 * (+ passive captcha right now)
	 * 2010-01-08 ms
	 */
	public function active($model = null, $options = array()) {
		return $this->input($model, $options);
	}

	/**
	 * @param array $captchaCode
	 */
	protected function buildHash($data) {
		return CaptchaLib::buildHash($data, $this->settings, true);
	}



/** following not needed */

	/*
	public function validateCaptcha($model, $data = null) {
		if (!empty($data[$model]['homepage'])) {
			// trigger error - SPAM!!!
		} elseif (empty($data[$model]['captcha_hash']) || empty($this->data[$model]['captcha_time']) || $this->data[$model]['captcha_time'] > time()-CAPTCHA_MIN_TIME) {
			// trigger error - SPAM!!!
		} elseif (isset($this->data[$model]['captcha'])) {
			$timestamp = date(FORMAT_DB_DATE, $this->data[$model]['captcha_time']);
			$hash = Security::hash($timestamp.'_'.$captchaCode['result'].'_');

			if ($this->data[$model]['captcha_hash'] == $hash) {
				return true;
			}
		}
		return false;
	}
	*/

	private function __fieldName($modelName = null) {
		$fieldName = 'captcha';
		if (isSet($modelName)) {
			$fieldName = $modelName.'.'.$fieldName;
		}
		return $fieldName;
	}

}
