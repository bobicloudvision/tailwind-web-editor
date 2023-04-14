import {getElementFriendlyName, hasId, allowedEditElementsList} from "../helpers";

export class HoverElementHandle {

    public name;
    public element

    public constructor(public iframeManager) {

        const createElementHandle = this.iframeManager.document.createElement("div");
        createElementHandle.id = 'js-live-edit-element-handle';
        createElementHandle.innerHTML = '<div id="js-live-edit-element-handle-name">Loading..</div>';

        this.iframeManager.body.appendChild(createElementHandle);

        this.element = this.iframeManager.document.getElementById('js-live-edit-element-handle');
        this.name = this.iframeManager.document.getElementById('js-live-edit-element-handle-name');

        this.runListener();
    }

    public runListener()
    {
        const app = this;
        app.iframeManager.document.addEventListener('mouseover', e => {

            let editorElements = app.iframeManager.body.getElementsByTagName('*');
            for (var j = 0; j < editorElements.length; j++) {
                app.element.style.display = 'none';
            }

            let mouseOverElement = app.iframeManager.document.elementFromPoint(e.clientX, e.clientY);
            if (mouseOverElement) {

                const allowedElementsList = allowedEditElementsList();
                if (!allowedElementsList.includes(mouseOverElement.tagName)) {
                    return;
                }

                // if (mouseOverElement == this.clickedElement) {
                //     return;
                // }

                if (hasId(mouseOverElement, 'js-live-edit-element-handle')) {
                    return;
                }

                if (hasId(mouseOverElement, 'js-live-edit-element-handle-active')) {
                    return;
                }

                app.element.style.width = (mouseOverElement.clientWidth + 10) + 'px';
                app.element.style.height = (mouseOverElement.clientHeight + 10) + 'px';

                let mouseOverElementBounding = mouseOverElement.getBoundingClientRect();
                app.element.style.top = (mouseOverElementBounding.top + (app.iframeManager.window.scrollY - 5)) + 'px';
                app.element.style.left = (mouseOverElementBounding.left + (app.iframeManager.window.scrollX - 5)) + 'px';

                app.name.innerText = getElementFriendlyName(mouseOverElement.tagName);
                app.element.style.display = 'block';

            }
        }, {passive: true});
    }

}
