M.tinymce_managefiles = M.tinymce_managefiles || {}
M.tinymce_managefiles.analysefiles = function(Y) {
    var form = Y.one('#tinymce_managefiles_manageform'),
        usedfiles, missingfiles = '', i
    if (!form || !window.parent || !window.parent.tinyMCE.activeEditor) {
        return;
    }
    usedfiles = window.parent.tinyMCE.activeEditor.execCommand('mceManageFilesUsedFiles')
    for (i in usedfiles) {
        if (!form.one('#deletefiles .felement.fcheckbox input[name="deletefile[' + usedfiles[i] + ']"]')) {
            missingfiles += '<li>' + usedfiles[i] + '</li>';
        }
    }
    if (missingfiles !== '') {
        form.addClass('hasmissingfiles')
        form.one('.managefilesstatus').setContent(M.str.tinymce_managefiles.hasmissingfiles + ' <ul>' + missingfiles + '</ul>')
    }
    form.all('#deletefiles .felement.fcheckbox').each(function(el) {
        var chb = el.one('input[type=checkbox]'),
            match = /^deletefile\[(.*)\]$/.exec(chb.get('name'));
        if (match && usedfiles.indexOf(match[1]) === -1) {
            el.addClass('isunused')
            form.addClass('hasunusedfiles')
        }
    });
    if (missingfiles === '' && !form.hasClass('hasunusedfiles')) {
        form.one('.managefilesstatus').setContent(M.str.tinymce_managefiles.allfilesok);
    }
}
