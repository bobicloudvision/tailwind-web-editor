<template>
    <div>
        <RadioGroup v-model="currentDevice" v-on:update:modelValue="switchDevice">
            <RadioGroupLabel class="sr-only"> Choose a browser ption </RadioGroupLabel>
            <div class="relative z-0 inline-flex shadow-sm rounded-md">
                <RadioGroupOption as="template" v-for="option in deviceSwitchOptions" :key="option.name" :value="option" :disabled="!option.isActive" v-slot="{ active, checked }">
                    <div :class="[option.isActive ? 'cursor-pointer focus:outline-none' : 'opacity-25 cursor-not-allowed', active ? 'ring-2 ring-offset-2 ring-indigo-500' : '', checked ? 'bg-indigo-600 border-transparent text-white hover:bg-indigo-700' : 'bg-white border-gray-200 text-gray-900 hover:bg-gray-50', 'border py-1 px-1 items-center justify-center text-sm font-medium uppercase']">
                        <RadioGroupLabel as="p">
                            {{ option.name }}
                        </RadioGroupLabel>
                    </div>
                </RadioGroupOption>
            </div>
        </RadioGroup>
    </div>
</template>

<script>
import { ref } from 'vue'
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'

const deviceSwitchOptions = [
    { name: 'Desktop', isActive: true },
    { name: 'Laptop', isActive: true },
    { name: 'Tablet', isActive: true },
    { name: 'Phone', isActive: true },
];

export default {
    props: [],
    emits: [],
    components: {
        RadioGroup,
        RadioGroupLabel,
        RadioGroupOption,
    },
    methods: {
        switchDevice: function (device) {
            let liveEditEvent = new CustomEvent('JsLiveEdit::SwitchDevice', {
                detail: {
                    device: device
                }
            })
            document.dispatchEvent(liveEditEvent);
        }
    },
    data() {
        let currentDevice = ref();
        return {
            deviceSwitchOptions:deviceSwitchOptions,
            currentDevice: currentDevice
        }
    }
}
</script>
