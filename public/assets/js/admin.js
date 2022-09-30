$(function () {
    const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
});

$(function () {
    tinymce.init({
        selector: "textarea#description",
        plugins:
            "a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker",
        toolbar:
            "a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table",
        toolbar_mode: "floating",
        tinycomments_mode: "embedded",
        tinycomments_author: "Paralegal FH UNIB",
    });
});

document.addEventListener("focusin", (e) => {
    if (
        e.target.closest(
            ".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root"
        ) !== null
    ) {
        e.stopImmediatePropagation();
    }
});
