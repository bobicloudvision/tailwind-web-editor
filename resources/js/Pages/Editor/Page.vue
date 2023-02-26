<template>

<Layout>

    d: {{ deviceName }}
    
    <template v-slot:main-content>
      <div style="height: 100%;">
          <iframe id="js-tailwind-editor-iframe" src="/live-edit-page/1"></iframe>
      </div>
    </template>

    <template v-slot:topbar-content>
        <BrowserSwitch />
    </template>

    <template v-slot:sidebar-content>
        <Tags class="mt-2" />
        <TextAlign class="mt-2" />
        <TextColor class="mt-2" />
        <BackgroundColor class="mt-2" />
    </template>

</Layout>

</template>

<style>
#js-tailwind-editor-iframe {
    width: 100%;
    height: 100%;
    overflow: hidden;
}
</style>


<script>

import Layout from './Layout.vue'
import Tags from './Text/Tags.vue'
import TextAlign from './Text/TextAlign.vue'
import TextColor from './Text/TextColor.vue'
import BackgroundColor from './Text/BackgroundColor.vue'
import BrowserSwitch from './Responsive/BrowserSwitch.vue'

let deviceName;
let lastSelectedElement = [];

export default {
    components: {
        BrowserSwitch,
        Tags,
        Layout,
        TextAlign,
        TextColor,
        BackgroundColor,
    },
    mounted() {

        document.addEventListener("JsLiveEdit::SwitchDevice", (event) => {
            this.deviceName = event.detail.device.name;
            this.$forceUpdate();
        });

        document.addEventListener("JsLiveEdit::ElementChange", (event) => {
            this.lastSelectedElement = event.detail;
            this.$forceUpdate();
        });


        runLiveEdit();

    },
    setup() {
        return {
            deviceName,
            lastSelectedElement,
        }
    },
}

function runLiveEdit() {

    let editorIframe = document.getElementById('js-tailwind-editor-iframe');
    editorIframe.onload = function () {

        let editorIframeDocument = editorIframe.contentDocument;
        let editorIframeBody = editorIframeDocument.body;

        var head = editorIframeDocument.getElementsByTagName('head')[0];
        var link = editorIframeDocument.createElement('link');
        link.id = 'js-tailwind-editor-iframe-stylesheet';
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = '/live-edit/elements.css';
        link.media = 'all';
        head.appendChild(link);

        let contentEditableElementsTags = [
            'h1',
            'h2',
            'h3',
            'h4',
            'h5',
            'h6',
            'a',
            'p',
            'span',
            'b',
            'button',
        ];

        let editableElementsClasses = [
            'flex',
        ];

        for (var i = 0; i < editableElementsClasses.length; i++) {
            let editorClass = editorIframeBody.getElementsByClassName(editableElementsClasses[i]);
            for (var j = 0; j < editorClass.length; j++) {

                editorClass[j].classList.add('js-live-edit-element');

                editorClass[j].addEventListener('mouseover', function () {
                    this.classList.add('js-live-edit-element-border');
                });

                editorClass[j].addEventListener('mouseleave', function () {
                    this.classList.remove('js-live-edit-element-border');
                    this.classList.remove('js-live-edit-element-background');
                });

            }
        }

        // editorIframeBody.addEventListener('click', function( event ){
        //     if (!lastSelectedElement.contains(event.target)) {
        //         if (event.hasAttribute('contenteditable')) {
        //             removeAllContentEditableElements();
        //         }
        //     }
        // });

        function removeAllColoredActivelements() {
            for (var i = 0; i < contentEditableElementsTags.length; i++) {
                let editorTag = editorIframeBody.getElementsByTagName(contentEditableElementsTags[i]);
                for (var j = 0; j < editorTag.length; j++) {
                    editorTag[j].classList.remove('js-live-edit-element-border');
                    editorTag[j].classList.remove('js-live-edit-element-background');
                    editorTag[j].classList.remove('js-live-edit-element-editing');
                }
            }
        }

        for (var i = 0; i < contentEditableElementsTags.length; i++) {
            let editorTag = editorIframeBody.getElementsByTagName(contentEditableElementsTags[i]);
            for (var j = 0; j < editorTag.length; j++) {

                // let canIAddContentEditable = true;
                // if (contentEditableElementsTags[i] == 'h1') {
                //     if (editorTag[j].children[0].classList.contains('block')) {
                //         canIAddContentEditable = false;
                //     }
                // }
                //
                // if (!canIAddContentEditable) {
                //    continue;
                // }

                editorTag[j].setAttribute('contenteditable', 'true');
                editorTag[j].classList.add('js-live-edit-element');

                /// stop href clicking
                if (editorTag[j].hasAttribute('href')) {
                    editorTag[j].addEventListener('click', function (event) {
                        event.preventDefault();
                    });
                }

                editorTag[j].addEventListener('keydown', function () {

                });

                editorTag[j].addEventListener('mouseover', function () {
                    this.classList.add('js-live-edit-element-border');
                });
                editorTag[j].addEventListener('mouseleave', function () {
                    if (!this.classList.contains('js-live-edit-element-editing')) {
                        this.classList.remove('js-live-edit-element-border');
                    }
                });

                editorTag[j].addEventListener('click', function (event) {

                    removeAllColoredActivelements();

                    let instanceElement = event.target;

                    instanceElement.classList.add('js-live-edit-element-border');
                    instanceElement.classList.add('js-live-edit-element-background');
                    instanceElement.classList.add('js-live-edit-element-editing');

                    //document.getElementById('lastSelectedElement').innerHTML = this.innerHTML;

                    //lastSelectedElement = this;

                    let elementType = 'text';
                    let elementClasses = [];

                    instanceElement.classList.forEach(function (item) {
                        if (!item.includes('js-live-edit')) {
                            elementClasses.push(item);
                        }
                    });

                    let liveEditEvent = new CustomEvent('JsLiveEdit::ElementChange', {
                        detail: {
                            element: instanceElement,
                            elementType: elementType,
                            classList: elementClasses,
                        }
                    })
                    document.dispatchEvent(liveEditEvent);

                });

            }
        }

    };
}
</script>
