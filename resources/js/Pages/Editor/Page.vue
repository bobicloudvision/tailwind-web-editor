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

            // Set all contenteditable elements to true
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
            ];
            for (var i = 0; i < contentEditableElementsTags.length; i++) {
                let editorTag = editorIframeBody.getElementsByTagName(contentEditableElementsTags[i]);
                for (var j = 0; j < editorTag.length; j++) {
                    editorTag[j].setAttribute('contenteditable', 'true');
                }
            }

        };
    }
}
</script>
