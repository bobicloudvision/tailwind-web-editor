import {allowedEditElementsList, getElementFriendlyName, elementHasParentsWithId} from "../../helpers";
import {ElementHandle} from "./../ElementHandle";

export class ClickedElementHandle extends ElementHandle {

    public name;
    public element;
    public settings;


    constructor(public liveEdit) {

        super(liveEdit);

        this.createElementHandle();
        this.addListener();
    }

    public createElementHandle() {

        const createElementHandle = this.iframeManager.document.createElement("div");
        createElementHandle.id = 'js-live-edit-element-handle-active';
        createElementHandle.innerHTML = '<div id="js-live-edit-element-handle-active-name">Image</div>' +
            '<div id="js-live-edit-element-handle-active-settings">' +
            '<button type="button">Settings</button>' +
            '</div>';

        this.iframeManager.body.appendChild(createElementHandle);

        this.element = this.iframeManager.document.getElementById('js-live-edit-element-handle-active');
        this.name = this.iframeManager.document.getElementById('js-live-edit-element-handle-active-name');
        this.settings = this.iframeManager.document.getElementById('js-live-edit-element-handle-active-settings');
    }

    public enableSettingsDelete()
    {
        let app = this;
        let createDeleteElementHandle = this.iframeManager.document.createElement('button');
        createDeleteElementHandle.innerText = 'Delete';
        createDeleteElementHandle.addEventListener('click', function (e) {
            e.preventDefault();
            app.liveEdit.clickedElement.remove();
        });

        this.settings.append(createDeleteElementHandle);
    }

    public enableSettingsDuplicate()
    {
        let app = this;
        let createCloneElementHandle = this.iframeManager.document.createElement('button');
        createCloneElementHandle.innerText = 'Clone';
        createCloneElementHandle.addEventListener('click', function (e) {
            e.preventDefault();
            app.liveEdit.clickedElement.outerHTML += app.liveEdit.clickedElement.outerHTML;

            // find new duplicable elements
            app.liveEdit.findDuplicableElements();
        });

        this.settings.append(createCloneElementHandle);
    }

    public resetSettings()
    {
        this.settings.innerHTML = '';
    }

    public addListener() {

        const app = this;
        app.iframeManager.document.addEventListener('click', e => {

            app.element.style.display = 'none';
            app.resetSettings();

            let clickedElement = app.iframeManager.document.elementFromPoint(e.clientX, e.clientY);
            if (clickedElement) {

                if (!this.canIEditThisElement(clickedElement)) {
                    return;
                }

                this.enableSettingsDelete();

                this.liveEdit.clickedElement = clickedElement;
                this.liveEdit.handles.mouseOverElementHandle.hide();

                let canIDuplicateElement = false;
                this.liveEdit.duplicableElements.forEach(function (item) {
                   if (item == clickedElement) {
                       canIDuplicateElement = true;
                   }
                });

                if (canIDuplicateElement) {
                    this.enableSettingsDuplicate();
                }

                app.element.style.width = (clickedElement.offsetWidth + 20) + 'px';
                app.element.style.height = (clickedElement.offsetHeight + 20) + 'px';

                let mouseOverElementBounding = clickedElement.getBoundingClientRect();
                app.element.style.top = (mouseOverElementBounding.top + (app.iframeManager.window.scrollY - 10)) + 'px';
                app.element.style.left = (mouseOverElementBounding.left + (app.iframeManager.window.scrollX - 10)) + 'px';

                app.name.innerText = getElementFriendlyName(clickedElement.tagName);
                app.element.style.display = 'block';

            }
        }, {passive: true});
    }

}
