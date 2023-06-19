<template>

<Layout>

    <template v-slot:main-content>
      <div class="p-5 bg-gray-100 w-full h-full flex justify-center items-center">
          <iframe id="js-tailwind-editor-iframe"

                  :style="[
               deviceName == 'Desktop' ? 'width:100%' : '',
                deviceName == 'Tablet' ? 'width:600px' : '',
                deviceName == 'Phone' ? 'width:450px' : ''
            ]"

                  class="rounded-xl" src="/templates/portfolio"></iframe>
      </div>
    </template>

    <template v-slot:topbar-content>

        <div class="flex-1 flex items-center space-x-2">
            <Button><ViewGridIcon class="w-4" /> Library</Button>
            <Button><PuzzleIcon class="w-4" /> Extensions</Button>
            <Button><vue-feather type="globe" class="w-4"></vue-feather> Browse</Button>
        </div>

        <div class="flex-1 flex items-center space-x-2">
            <BrowserSwitch />
            <Button><vue-feather type="sliders" class="w-4"></vue-feather></Button>
        </div>

        <div class="flex-1 flex items-center space-x-2">
            <Button><vue-feather type="rotate-ccw" class="w-4"></vue-feather></Button>
            <Button><vue-feather type="rotate-cw" class="w-4"></vue-feather></Button>
            <Button><vue-feather type="save" class="w-4"></vue-feather></Button>
            <Button><vue-feather type="eye" class="w-4"></vue-feather> Preview</Button>
            <Button><vue-feather type="send" class="w-4"></vue-feather> Publish</Button>
            <Button><vue-feather type="settings" class="w-4"></vue-feather></Button>
        </div>

<!--        <Tags class="mt-2" />-->
    </template>

    <template v-slot:sidebar-content>
        <TextAlign class="mt-2" />
        <TextColor class="mt-2" />
        <BackgroundColor class="mt-2" />
    </template>

    <template v-slot:bottom-bar-content>
        <Tags class="mt-2" />
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
import {LiveEdit} from "../../LiveEdit/LiveEdit";

import {
    BackspaceIcon,
    FastForwardIcon,
    EyeIcon,
    PaperAirplaneIcon,
    SaveIcon,
    ViewGridIcon,
    PuzzleIcon,
    BookmarkIcon,
    CogIcon,
    AdjustmentsIcon,
    ArrowSmLeftIcon,
    ArrowSmRightIcon,

} from '@heroicons/vue/outline'

import Layout from './Layout.vue'
import Tags from './Text/Tags.vue'
import TextAlign from './Text/TextAlign.vue'
import TextColor from './Text/TextColor.vue'
import BackgroundColor from './Text/BackgroundColor.vue'
import BrowserSwitch from './Responsive/BrowserSwitch.vue'
import Button from "./Button.vue";

let deviceName;
let lastSelectedElement = [];

export default {
    components: {
        BackspaceIcon,
        FastForwardIcon,
        EyeIcon,
        PaperAirplaneIcon,
        SaveIcon,
        ViewGridIcon,
        PuzzleIcon,
        BookmarkIcon,
        CogIcon,
        AdjustmentsIcon,
        ArrowSmLeftIcon,
        ArrowSmRightIcon,
        Button,
        BrowserSwitch,
        Tags,
        Layout,
        TextAlign,
        TextColor,
        BackgroundColor,
    },
    mounted() {

        document.addEventListener("JsLiveEdit::SwitchDevice", (event) => {
            this.deviceName = event.detail.device;
            this.$forceUpdate();
        });

        document.addEventListener("JsLiveEdit::ElementChange", (event) => {
            this.lastSelectedElement = event.detail;
            this.$forceUpdate();
        });

        const liveEdit = new LiveEdit('js-tailwind-editor-iframe');
        liveEdit.fire();

    },
    data() {
        return {
            deviceName,
            lastSelectedElement,
        }
    },
}
</script>
