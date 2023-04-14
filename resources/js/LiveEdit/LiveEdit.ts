import {hasId, getElementFriendlyName} from "./helpers";
import {IframeManager} from "./IframeManager";
import {ClickedElementHandle} from "./Handles/ClickedElementHandle";
import {HoverElementHandle} from "./Handles/HoverElementHandle";

export class LiveEdit {

    public iframeManager;
    public clickedElement;

    public handles = {
        clickedElementHandle: {},
        hoverElementHandle: {},
    };

    public constructor(public iframeId: string) {}

    public fire() {

       const app = this;
        app.iframeManager = new IframeManager(this.iframeId);

        app.iframeManager.onLoad(function() {

           app.handles.clickedElementHandle = new ClickedElementHandle(app.iframeManager);
           app.handles.hoverElementHandle = new HoverElementHandle(app.iframeManager);

           app.appendStyles();
       });

    }

    private build()
    {
        const app = this;

        // Element Hover
        // Element Active



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

        // let editableElementsClasses = [
        //     'flex',
        // ];
        //
        // for (var i = 0; i < editableElementsClasses.length; i++) {
        //     let editorClass = editorIframeBody.getElementsByClassName(editableElementsClasses[i]);
        //     for (var j = 0; j < editorClass.length; j++) {
        //
        //         editorClass[j].classList.add('js-live-edit-element');
        //
        //         editorClass[j].addEventListener('mouseover', function () {
        //             this.classList.add('js-live-edit-element-border');
        //         });
        //
        //         editorClass[j].addEventListener('mouseleave', function () {
        //             this.classList.remove('js-live-edit-element-border');
        //             this.classList.remove('js-live-edit-element-background');
        //         });
        //
        //     }
        // }

        // editorIframeBody.addEventListener('click', function( event ){
        //     if (!lastSelectedElement.contains(event.target)) {
        //         if (event.hasAttribute('contenteditable')) {
        //             removeAllContentEditableElements();
        //         }
        //     }
        // });

        function removeAllColoredActivelements() {
            let editorTag = this.editorIframeBody.getElementsByTagName('*');
            for (var j = 0; j < editorTag.length; j++) {
                // editorTag[j].classList.remove('js-live-edit-element-border');
                // editorTag[j].classList.remove('js-live-edit-element-background');
                // editorTag[j].classList.remove('js-live-edit-element-editing');
            }
        }

        // let canIAddContentEditable = true;
        // // if (contentEditableElementsTags[i] == 'h1') {
        // //     if (editorTag[j].children[0].classList.contains('block')) {
        // //         canIAddContentEditable = false;
        // //     }
        // // }
        // //
        // if (!canIAddContentEditable) {
        //    continue;
        // }
        //
        // editorTag[j].setAttribute('contenteditable', 'true');

        let editorTag = this.editorIframeBody.getElementsByTagName('*');
        for (var j = 0; j < editorTag.length; j++) {

            //    editorTag[j].classList.add('js-live-edit-element');

            /// stop href clicking
            if (editorTag[j].hasAttribute('href')) {
                editorTag[j].addEventListener('click', function (event) {
                    event.preventDefault();
                });
            }

            editorTag[j].addEventListener('keydown', function () {

            });

            // editorTag[j].addEventListener('mouseleave', function () {
            //     if (!this.classList.contains('js-live-edit-element-editing')) {
            //         this.classList.remove('js-live-edit-element-border');
            //     }
            // });

            editorTag[j].addEventListener('click', function (event) {

                this.clickedElement = event.target;

                let instanceElement = event.target;


                elementHandleActive.style.width = instanceElement.clientWidth + 'px';
                elementHandleActive.style.height = instanceElement.clientHeight + 'px';

                let instanceElementBounding = instanceElement.getBoundingClientRect();
                elementHandleActive.style.top = (instanceElementBounding.top + app.editorIframeWindow.scrollY) + 'px';
                elementHandleActive.style.left = (instanceElementBounding.left + app.editorIframeWindow.scrollX) + 'px';

                elementHandleActiveName.innerText = getElementFriendlyName(instanceElement.tagName);
                elementHandleActive.style.display = 'block';

                elementHandle.style.display = 'none';

                // instanceElement.classList.add('js-live-edit-element-border');
                // instanceElement.classList.add('js-live-edit-element-background');
                // instanceElement.classList.add('js-live-edit-element-editing');

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

    private appendStyles()
    {
        var head = this.iframeManager.document.getElementsByTagName('head')[0];
        var link = this.iframeManager.document.createElement('link');

        link.id = 'js-tailwind-editor-iframe-stylesheet';
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = '/live-edit/elements.css';
        link.media = 'all';

        head.appendChild(link);
    }
}
