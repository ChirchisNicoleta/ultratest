<template>
  <div
    class="relative rounded-lg rounded-b-lg bg-gray-100 dark:bg-gray-800 bg-clip border border-gray-300 dark:border-gray-600"
    :class="{ 'mr-11': editMode && deleteRowEnabled }"
  >
    <slot />
  </div>
</template>

<script>
export default {
  props: {
    deleteRowEnabled: {
      type: Boolean,
      default: true,
    },
    editMode: {
      type: Boolean,
      default: true,
    },
  },
}
</script>
