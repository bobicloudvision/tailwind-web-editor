<template>
    <div>
        <RadioGroup v-model="mem">
            <RadioGroupLabel class="sr-only"> Choose a memory option </RadioGroupLabel>
            <div class="relative z-0 inline-flex shadow-sm rounded-md">
                <RadioGroupOption as="template" v-for="option in memoryOptions" :key="option.name" :value="option" :disabled="!option.inStock" v-slot="{ active, checked }">
                    <div :class="[option.inStock ? 'cursor-pointer focus:outline-none' : 'opacity-25 cursor-not-allowed', active ? 'ring-2 ring-offset-2 ring-indigo-500' : '', checked ? 'bg-indigo-600 border-transparent text-white hover:bg-indigo-700' : 'bg-white border-gray-200 text-gray-900 hover:bg-gray-50', 'border py-1 px-1 items-center justify-center text-sm font-medium uppercase']">
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

const memoryOptions = [
    { name: 'Left', inStock: true },
    { name: 'Center', inStock: true },
    { name: 'Right', inStock: true },
]

export default {
    components: {
        RadioGroup,
        RadioGroupLabel,
        RadioGroupOption,
    },
    setup() {
        const mem = ref(memoryOptions[2])

        return {
            memoryOptions,
            mem,
        }
    },
}
</script>
