<?php
/**
 * @version     1.1.0
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2015. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.phpmyjoomla.com
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Supports an HTML select list of categories
 */
class JFormFieldCreatedby extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'createdby';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html = array();
        
        
		//Load user
		$user_id = $this->value;
		if ($user_id) {
			$user = JFactory::getUser($user_id);
		} else {
			$user = JFactory::getUser();
			$html[] = '<input type="hidden" name="'.$this->name.'" value="'.$user->id.'" />';
		}
		$html[] = "<div>".$user->name." (".$user->username.")</div>";
        
		return implode($html);
	}
}