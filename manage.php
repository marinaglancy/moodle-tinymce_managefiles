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
 * Manage files in user draft area attached to texteditor
 *
 * @package   tinymce_managefiles
 * @copyright 2013 Marina Glancy
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../../../../config.php');
require_once('manage_form.php');

require_login();
if (isguestuser()) {
    print_error('noguest');
}

$itemid = required_param('itemid', PARAM_INT);
$maxbytes = optional_param('maxbytes', 0, PARAM_INT);
$accepted_types = optional_param('accepted_types', '*', PARAM_RAW); // TODO not yet passed to this script
$return_types = optional_param('return_types', null, PARAM_INT);
$areamaxbytes = optional_param('areamaxbytes', FILE_AREA_MAX_BYTES_UNLIMITED, PARAM_INT);
$contextid = optional_param('context', SYSCONTEXTID, PARAM_INT);

$title = get_string('manageareafiles', 'tinymce_managefiles');

$PAGE->set_url('/lib/editor/tinymce/plugins/managefiles/manage.php');
$PAGE->set_context(context::instance_by_id($contextid));
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_pagelayout('popup');

$options = array(
    'subdirs' => 0,
    'maxbytes' => $maxbytes,
    'maxfiles' => -1,
    'accepted_types' => $accepted_types,
    'areamaxbytes' => $areamaxbytes,
    'return_types' => $return_types
);

$mform = new repository_areafiles_manage_form(null,
        array('options' => $options, 'draftitemid' => $itemid));

echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
