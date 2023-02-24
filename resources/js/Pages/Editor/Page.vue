<style>
.js-tailwind-editor {
    width: 90%;
    margin: 0 auto;
    margin-top: 150px;
    padding:25px;
}
#js-tailwind-editor-iframe {
    width: 100%;
    height: 500px;
    overflow-y: scroll;
}
</style>

<template>

    <div class="js-tailwind-editor">
        <iframe id="js-tailwind-editor-iframe" src="simple-theme.html"></iframe>
    </div>

</template>

<script>
export default {
    mounted() {
        let editorIframe = document.getElementById('js-tailwind-editor-iframe');
        editorIframe.onload = function() {

            let editorIframeDocument = editorIframe.contentDocument;
            let editorIframeBody = editorIframeDocument.body;

            var head  = editorIframeDocument.getElementsByTagName('head')[0];
            var link  = editorIframeDocument.createElement('link');
            link.id   = 'js-tailwind-editor-iframe-stylesheet';
            link.rel  = 'stylesheet';
            link.type = 'text/css';
            link.href = 'live-edit/elements.css';
            link.media = 'all';
            head.appendChild(link);

            let contentEditableElementsTags = [
                'h1',
                'h2',
                'h3',
                'h4',
                'h5',
                'h6',
                'p',
                'span',
                'b',
                'button',
            ];


            function removeAllContentEditableElements() {
                for (var i = 0; i < contentEditableElementsTags.length; i++) {
                    let editorTag = editorIframeBody.getElementsByTagName(contentEditableElementsTags[i]);
                    for (var j = 0; j < editorTag.length; j++) {
                        editorTag[j].removeAttribute('contenteditable', 'true');
                        editorTag[j].classList.remove('js-live-edit-element-border');
                        editorTag[j].classList.remove('js-live-edit-element-background');
                    }
                }
            }

            for (var i = 0; i < contentEditableElementsTags.length; i++) {
                let editorTag = editorIframeBody.getElementsByTagName(contentEditableElementsTags[i]);
                for (var j = 0; j < editorTag.length; j++) {

                    editorTag[j].classList.add('js-live-edit-element');

                    editorTag[j].addEventListener('keydown', function () {

                    });

                    editorTag[j].addEventListener('click', function () {
                        if (!this.hasAttribute('contenteditable')) {
                            removeAllContentEditableElements();
                            this.classList.add('js-live-edit-element-border');
                            this.classList.add('js-live-edit-element-background');
                        }
                    });

                    editorTag[j].addEventListener('mouseover', function () {
                        if (!this.hasAttribute('contenteditable')) {
                            this.classList.add('js-live-edit-element-border');
                        }
                    });

                    editorTag[j].addEventListener('dblclick', function () {
                        removeAllContentEditableElements();
                        this.setAttribute('contenteditable', 'true');
                    });

                    editorTag[j].addEventListener('mouseenter', function () {

                    });

                    editorTag[j].addEventListener('mouseleave', function () {
                        let removeClasses = true;
                        if (this.hasAttribute('contenteditable')) {
                            removeClasses = false;
                        }
                        if (removeClasses) {
                            this.classList.remove('js-live-edit-element-border');
                            this.classList.remove('js-live-edit-element-background');
                        }
                    });

                }
            }

        };
    }
}
</script>
