<?php
/**
 * Social Login
 *
 * @version 	1.0
 * @author		SmokerMan, Arkadiy, Joomline
 * @copyright	© 2012. All rights reserved.
 * @license 	GNU/GPL v.3 or later.
 */

// защита от прямого доступа
defined('_JEXEC') or die('@-_-@');

jimport('joomla.form.formfield');

class JFormFieldCallbackUrl extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	public $type = 'CallbackUrl';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
		$task = !empty($this->element['value']) ? '?option=com_slogin&task=plugins.check&plugin=' . (string) $this->element['value'] : '';
		$readonly = ((string) $this->element['readonly'] == 'true') ? ' readonly="readonly"' : '';
		$class = $this->element['class'] ? ' class="' . (string) $this->element['class'] . '"' : '';

		$CallbackUrl = JURI::root().$task;

        if(substr($CallbackUrl, -1, 1) == '/'){
             $CallbackUrl = substr($CallbackUrl, 0, -1);
        }
		
		$html = '<input type="text" name="' . $this->name . '" id="' . $this->id . '"' . ' value="'.$CallbackUrl.'" size="70%" '. $class . $readonly .' />';
		
		return $html;
	}
}