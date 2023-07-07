import {elementHasParentsWithId, getElementFriendlyName} from "./helpers";
import {IframeManager} from "./IframeManager";
import {ClickedElementHandle} from "./Handles/Elements/ClickedElementHandle";
import {MouseOverElementHandle} from "./Handles/Elements/MouseOverElementHandle";
import {MouseOverModuleHandle} from "./Handles/Modules/MouseOverModuleHandle";
import {ClickedModuleHandle} from "./Handles/Modules/ClickedModuleHandle";

export class LiveEdit {

    public iframeManager;

    public clickedElement;
    public clickedModule;

    public mouseOverElement;
    public mouseOverModule;

    public handles = {
        clickedElementHandle: {},
        clickedModuleHandle: {},
        mouseOverElementHandle: {},
        mouseOverModuleHandle: {},
    };

    public duplicableElements = [];

    public constructor(public iframeId: string) {}

    public fire() {

       const app = this;

        app.iframeManager = new IframeManager(this.iframeId);
        app.iframeManager.onLoad(function() {

           app.handles.clickedElementHandle = new ClickedElementHandle(app);
           app.handles.mouseOverElementHandle = new MouseOverElementHandle(app);

           app.handles.clickedModuleHandle = new ClickedModuleHandle(app);
           app.handles.mouseOverModuleHandle = new MouseOverModuleHandle(app);

            app.iframeManager.body.addEventListener("keyup", (event) => {
                app.handles.clickedElementHandle.calculateHandlePosition();
            });

           app.appendStyles();
           app.findDuplicableElements();

       });

    }

    private findDuplicableElements()
    {
        const app = this;
        let elementParents = [];
        let editableElementsInPage = app.iframeManager.body.getElementsByTagName('*');
        for (var j = 0; j < editableElementsInPage.length; j++) {
            let objIndex = elementParents.findIndex((obj => obj.parent == editableElementsInPage[j].parentElement));
            if (objIndex > 0) {
                elementParents[objIndex].elements.push(editableElementsInPage[j]);
            } else {
                elementParents.push({
                    'parent': editableElementsInPage[j].parentElement,
                    'elements': [editableElementsInPage[j]]
                });
            }
        }

        for (var ja = 0; ja < elementParents.length; ja++) {
            if (elementParents[ja].elements.length > 1) {
                let elementClasses = [];
                for (var jk = 0; jk < elementParents[ja].elements.length; jk++) {
                    elementClasses.push(elementParents[ja].elements[jk].className);
                }
                const elementClassesCounts = {};
                elementClasses.forEach(function (x) { elementClassesCounts[x] = (elementClassesCounts[x] || 0) + 1; });
                if (Object.values(elementClassesCounts)[0] == elementParents[ja].elements.length) {
                    for (var jkx = 0; jkx < elementParents[ja].elements.length; jkx++) {
                        app.duplicableElements.push(elementParents[ja].elements[jkx]);
                    }
                }
            }
        }
    }

    private appendStyles()
    {

        var head = this.iframeManager.document.getElementsByTagName('head')[0];


        // Element styles
        var link = this.iframeManager.document.createElement('link');
        link.id = 'js-tailwind-editor-iframe-stylesheet-elements';
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = '/live-edit/elements.css';
        link.media = 'all';

        head.appendChild(link);

        // Module styles
        var link = this.iframeManager.document.createElement('link');
        link.id = 'js-tailwind-editor-iframe-stylesheet-modules';
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = '/live-edit/modules.css';
        link.media = 'all';

        head.appendChild(link);


    }
}
