import {allowedEditElementsList, getElementFriendlyName, elementHasParentsWithId} from "../../helpers";
import {ElementHandle} from "./../ElementHandle";

export class FlexGridResizer extends ElementHandle {

    public element;

    public resizeNorth;
    public resizeNorthNow = false;

    public resizeNorthWest;
    public resizeNorthEast;

    public resizeWest;
    public resizeWestNow = false

    public resizeSouth;
    public resizeSouthNow = false;

    public resizeSouthWest;
    public resizeSouthEast;

    public resizeEast;
    public resizeEastNow = false;


    constructor(public liveEdit) {

        super(liveEdit);

        this.createElementHandle();

        let app = this;
        document.addEventListener("JsLiveEdit::ElementChange", (event) => {
            app.calculateHandlePosition();
        });

    }

    public calculateHandlePosition() {

        let app = this;
        let clickedElement = app.liveEdit.clickedElement;

        app.element.style.width = (clickedElement.offsetWidth + 60) + 'px';
        app.element.style.height = (clickedElement.offsetHeight + 60) + 'px';

        let mouseOverElementBounding = clickedElement.getBoundingClientRect();
        app.element.style.top = (mouseOverElementBounding.top + (app.iframeManager.window.scrollY - 30)) + 'px';
        app.element.style.left = (mouseOverElementBounding.left + (app.iframeManager.window.scrollX - 30)) + 'px';

        app.element.style.display = 'block';
    }

    public createElementHandle() {

        const createElementHandle = this.iframeManager.document.createElement("div");

        createElementHandle.id = 'js-live-edit-element-handle-flex-grid-resizer';
        createElementHandle.innerHTML = '' +
            '' +
            '<button id="js-live-edit-element-handle-flex-grid-resizer-north" type="button"> north </button>' +
            '<button id="js-live-edit-element-handle-flex-grid-resizer-north-west" type="button"> north-west </button>' +
            '<button id="js-live-edit-element-handle-flex-grid-resizer-north-east" type="button"> north-east </button>' +
            '<button id="js-live-edit-element-handle-flex-grid-resizer-west" type="button"> west </button>' +
            '<button id="js-live-edit-element-handle-flex-grid-resizer-south" type="button"> south </button>' +
            '<button id="js-live-edit-element-handle-flex-grid-resizer-south-west" type="button"> south-west </button>' +
            '<button id="js-live-edit-element-handle-flex-grid-resizer-south-east" type="button"> south-east </button>' +
            '<button id="js-live-edit-element-handle-flex-grid-resizer-east" type="button"> east </button>' +
            '' +
            '';
        this.iframeManager.body.appendChild(createElementHandle);

        this.element = this.iframeManager.document.getElementById('js-live-edit-element-handle-flex-grid-resizer');
        this.resizeNorth = this.iframeManager.document.getElementById('js-live-edit-element-handle-flex-grid-resizer-north');
        this.resizeNorthWest = this.iframeManager.document.getElementById('js-live-edit-element-handle-flex-grid-resizer-north-west');
        this.resizeNorthEast = this.iframeManager.document.getElementById('js-live-edit-element-handle-flex-grid-resizer-north-east');
        this.resizeWest = this.iframeManager.document.getElementById('js-live-edit-element-handle-flex-grid-resizer-west');
        this.resizeSouth = this.iframeManager.document.getElementById('js-live-edit-element-handle-flex-grid-resizer-south');
        this.resizeSouthWest = this.iframeManager.document.getElementById('js-live-edit-element-handle-flex-grid-resizer-south-west');
        this.resizeSouthEast = this.iframeManager.document.getElementById('js-live-edit-element-handle-flex-grid-resizer-south-east');
        this.resizeEast = this.iframeManager.document.getElementById('js-live-edit-element-handle-flex-grid-resizer-east');


        // grid-row-start
        // grid-row-end
        // grid-column-start
        // grid-column-end

        let instance = this;

        this.resizeEast.addEventListener('click', (clickEvent) => {
            clickEvent.preventDefault();
            clickEvent.stopPropagation();
        });
        this.resizeSouth.addEventListener('click', (clickEvent) => {
            clickEvent.preventDefault();
            clickEvent.stopPropagation();
        });

        this.resizeEast.addEventListener('mousedown', (clickEvent) => {

            clickEvent.preventDefault();
            clickEvent.stopPropagation();
            if (!this.liveEdit.clickedElement) {
                return false;
            }
            instance.resetAllResizers();
            instance.resizeEastNow = true;
            instance.initDrag(clickEvent);
        });

        this.resizeSouth.addEventListener('mousedown', (clickEvent) => {

            clickEvent.preventDefault();
            clickEvent.stopPropagation();
            if (!this.liveEdit.clickedElement) {
                return false;
            }
            instance.resetAllResizers();
            instance.resizeSouthNow = true;
            instance.initDrag(clickEvent);
        });

    }

    public resetAllResizers() {
        this.resizeNorthNow = false;
        this.resizeWestNow = false;
        this.resizeSouthNow = false;
        this.resizeEastNow = false;
    }

    initDrag = (e) => {
        // startX = e.clientX;
        // startY = e.clientY;
        // startWidth = parseInt(document.defaultView.getComputedStyle(p).width, 10);
        // startHeight = parseInt(document.defaultView.getComputedStyle(p).height, 10);

        this.iframeManager.document.addEventListener('mousemove', this.doDrag, false);
        this.iframeManager.document.addEventListener('mouseup', this.stopDrag, false);

        console.log('initDrag');
    }

    doDrag = (e) => {

       let instance = this;

       if (instance.resizeEastNow) {
           let boundingClientRect = this.resizeEast.getBoundingClientRect();
           let diffBetween = Math.abs((boundingClientRect.x - e.clientX) / e.clientX * 100);
           if (diffBetween > 6) {
               if (boundingClientRect.x > e.clientX) {
                   console.log('drag left' + boundingClientRect.x);
                   this.liveEdit.clickedElement.style['grid-column-end'] = (parseInt(this.liveEdit.clickedElement.style['grid-column-end']) - 1);
               } else {
                   console.log('drag right' + boundingClientRect.x);
                   this.liveEdit.clickedElement.style['grid-column-end'] = (parseInt(this.liveEdit.clickedElement.style['grid-column-end']) + 1);
               }
           }
       }

        if (instance.resizeSouthNow) {
            let boundingClientRectSouth = this.resizeSouth.getBoundingClientRect();
            let diffBetweenSouth = Math.abs((boundingClientRectSouth.y - e.clientY) / e.clientY * 100);
            if (diffBetweenSouth > 13) {
                console.log('diffBetweenSouth' + diffBetweenSouth);

                if (boundingClientRectSouth.y > e.clientY) {
                    console.log('drag top' + boundingClientRectSouth.y);
                    let newGridRowEndNegative = (parseInt(this.liveEdit.clickedElement.style['grid-row-end']) - 1);
                    if (newGridRowEndNegative >= 18) {
                        return;
                    }
                    this.liveEdit.clickedElement.style['grid-row-end'] = newGridRowEndNegative;
                } else {
                    console.log('drag bottom' + boundingClientRectSouth.y);
                    let newGridRowEndNegative = (parseInt(this.liveEdit.clickedElement.style['grid-row-end']) + 1);
                    if (newGridRowEndNegative >= 18) {
                        return;
                    }
                    this.liveEdit.clickedElement.style['grid-row-end'] = newGridRowEndNegative;
                }
            }
        }

       instance.calculateHandlePosition();
       this.liveEdit.handles.clickedElementHandle.calculateHandlePosition();

       console.log('doDrag');
    }

    stopDrag = (e) => {

        this.iframeManager.document.removeEventListener('mousemove', this.doDrag, false);
        this.iframeManager.document.removeEventListener('mouseup', this.stopDrag, false);

        console.log('stopDrag');
    }


}
