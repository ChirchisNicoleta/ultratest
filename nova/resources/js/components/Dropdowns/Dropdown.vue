<template>
  <div>
    <button
      ref="trigger"
      :aria-expanded="show === true ? 'true' : 'false'"
      class="rounded active:outline-none active:ring focus:outline-none focus:ring"
      type="button"
      @click.stop="showMenu"
    >
      <slot />
    </button>

    <teleport to="body">
      <div
        v-show="show"
        ref="menu"
        class="relative z-40"
        :data-menu-open="show"
        @click="handleClick"
      >
        <slot name="menu" />
      </div>
    </teleport>

    <teleport to="#dropdowns">
      <div
        v-if="show"
        class="z-[35] fixed inset-0"
        dusk="dropdown-overlay"
        @click="() => hideMenu()"
      />
    </teleport>
  </div>
</template>

<script>
import debounce from 'lodash/debounce'
import { createPopper } from '@popperjs/core'

export default {
  emits: ['menu-opened', 'menu-closed'],

  props: {
    offset: {
      type: [Number, String],
      default: 5,
    },

    placement: {
      type: String,
      default: 'bottom-start',
    },

    boundary: {
      type: String,
      default: 'viewPort',
    },

    autoHide: {
      type: Boolean,
      default: true,
    },

    handleInternalClicks: {
      type: Boolean,
      default: true,
    },
  },

  data: () => ({
    show: false,
    popper: null,
    debouncedHideMenu: null,
  }),

  methods: {
    handleClick() {
      if (this.handleInternalClicks) {
        this.hideMenu()
      }
    },

    createPopper() {
      /**
       * Create the popper for the containing element.
       */
      this.popper = createPopper(this.$refs.trigger, this.$refs.menu, {
        placement: this.placement,
        boundary: this.boundary,
        modifiers: {
          name: 'offset',
          options: {
            offset: [0, this.offset],
          },
        },
      })
    },

    /**
     * Show the dropdown menu.
     */
    showMenu() {
      if (this.debouncedHideMenu) {
        this.debouncedHideMenu.cancel()
        this.debouncedHideMenu = null
      }

      this.show = true

      this.$emit('menu-opened')

      this.createPopper()
    },

    /**
     * Hide the dropdown menu.
     */
    hideMenu() {
      if (this.show === true && this.debouncedHideMenu) {
        this.debouncedHideMenu = null
      }

      this.show = false

      this.$emit('menu-closed')

      if (this.popper) {
        this.popper.destroy()
        this.popper = null
      }
    },

    delayedHideMenu() {
      if (this.debouncedHideMenu === null) {
        this.debouncedHideMenu = debounce(() => this.hideMenu(), 500)
      }

      this.debouncedHideMenu()
    },
  },
}
</script>
