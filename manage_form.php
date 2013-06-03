<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Class repository_areafiles_manage_form
 *
 * @package   tinymce_managefiles
 * @copyright 2013 Marina Glancy
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir."/formslib.php");

/**
 * Form allowing to edit files in one draft area
 *
 * No buttons are necessary since the draft area files are saved immediately using AJAX
 *
 * @package   tinymce_managefiles
 * @copyright 2013 Marina Glancy
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class repository_areafiles_manage_form extends moodleform {
    function definition() {
        $mform = $this->_form;

        $itemid           = $this->_customdata['draftitemid'];
        $options        = $this->_customdata['options'];

        $mform->addElement('filemanager', 'files_filemanager', '', null, $options);

        $this->set_data(array('files_filemanager' => $itemid));
    }
}
