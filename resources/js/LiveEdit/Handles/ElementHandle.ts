import {allowedEditElementsList, elementHasParentsWithId} from "../helpers";

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

        if (elementHasParentsWithId(element, 'js-live-edit-element-handle')) {
            return false;
        }

        if (elementHasParentsWithId(element, 'js-live-edit-element-handle-active')) {
            return false;
        }

        return true;
    }

}
