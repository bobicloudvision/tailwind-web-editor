import {allowedEditElementsList, elementHasParentsWithId, elementHasParentsWithAttribute} from "../helpers";

export class ElementHandle {

    public iframeManager;

    public constructor(public liveEdit) {
        this.iframeManager = liveEdit.iframeManager;
    }

    public canIEditThisElement(element)
    {
        const allowedElementsList = allowedEditElementsList();
        if (!allowedElementsList.includes(element.tagName)) {
            return false;
        }

        if (!elementHasParentsWithAttribute(element, 'tailwind-x:editable')) {
            return false;
        }

        if (elementHasParentsWithAttribute(element, 'tailwind-x:module')) {
            return false;
        }

        if (element.hasAttribute('tailwind-x:module')) {
            return false;
        }

        if (elementHasParentsWithId(element, 'js-live-edit-element-handle')) {
            return false;
        }

        if (elementHasParentsWithId(element, 'js-live-edit-element-handle-active')) {
            return false;
        }

        return true;
    }

}
