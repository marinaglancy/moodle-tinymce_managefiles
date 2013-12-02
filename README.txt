This plugin will add a button to the TinyMCE text editor in Moodle that allows to
manage files embedded in the current text area.

To install copy files to lib/editor/tinymce/plugins/managefiles
Please note that Moodle 2.6 already includes this plugin in the standard distribution.

CHANGES LOG
===========

Version 1.3
-----------

- Plugin now work correctly in quiz questions (for legacy reasons those textareas
  allows subfolders in the filearea attached to the editor).
- Popup automatically opens fullscreen on small screens
- Popup window correctly uses current environment (theme and language of the
  current course and/or user).
