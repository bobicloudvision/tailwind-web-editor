import {
    allowedEditElementsList,
    getElementFriendlyName,
    elementHasParentsWithId,
    elementHasParentsWithAttribute
} from "../../helpers";
import {ElementHandle} from "./../ElementHandle";

export class ClickedModuleHandle extends ElementHandle {

    public handleNameElement;
    public handleMainElement;
    public handleSettingsElement;

    constructor(public liveEdit) {

        super(liveEdit);

        this.createElementHandle();
        this.addListener();
    }

    public createElementHandle() {

        const createElementHandle = this.iframeManager.document.createElement("div");
        createElementHandle.id = 'js-live-edit-module-handle-active';
        createElementHandle.innerHTML = '<div id="js-live-edit-module-handle-active-name">Module</div>' +
            '<div id="js-live-edit-module-handle-active-settings">' +
            '<button type="button">Settings</button>' +
            '</div>';

        this.iframeManager.body.appendChild(createElementHandle);

        this.handleMainElement = this.iframeManager.document.getElementById('js-live-edit-module-handle-active');
        this.handleNameElement = this.iframeManager.document.getElementById('js-live-edit-module-handle-active-name');
        this.handleSettingsElement = this.iframeManager.document.getElementById('js-live-edit-module-handle-active-settings');
    }

    public enableSettingsButton()
    {
        let app = this;
        let createDeleteElementHandle = this.iframeManager.document.createElement('button');
        createDeleteElementHandle.innerText = 'Settings';
        createDeleteElementHandle.addEventListener('click', function (e) {
            e.preventDefault();
            app.liveEdit.clickedElement.remove();
        });

        this.handleSettingsElement.append(createDeleteElementHandle);
    }

    public resetSettings()
    {
        this.handleSettingsElement.innerHTML = '';
    }

    public addListener() {

        const app = this;
        app.iframeManager.document.addEventListener('click', e => {

            app.handleMainElement.style.display = 'none';
            app.resetSettings();

            let clickedElement = app.iframeManager.document.elementFromPoint(e.clientX, e.clientY);
            if (clickedElement) {

                let getElementParentModuleElement = elementHasParentsWithAttribute(clickedElement, 'tailwind-x:module');
                if (!getElementParentModuleElement) {
                    return;
                }

                this.enableSettingsButton();

                this.liveEdit.clickedModule = getElementParentModuleElement;
                this.liveEdit.handles.mouseOverModuleHandle.hide();


                app.handleMainElement.style.width = (clickedElement.clientWidth + 5) + 'px';
                app.handleMainElement.style.height = (clickedElement.clientHeight + 5) + 'px';

                let clickedElementBounding = clickedElement.getBoundingClientRect();
                app.handleMainElement.style.top = (clickedElementBounding.top + (app.iframeManager.window.scrollY - 2.5)) + 'px';
                app.handleMainElement.style.left = (clickedElementBounding.left + (app.iframeManager.window.scrollX - 2.5)) + 'px';
                app.handleMainElement.style.display = 'block';

                let moduleFriendlyName = getElementParentModuleElement.getAttribute('tailwind-x:module').toUpperCase();
                if (app.handleNameElement) {
                    app.handleNameElement.innerText = moduleFriendlyName;
                }


            }
        }, {passive: true});
    }

}
