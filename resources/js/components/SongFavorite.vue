<template>
  <div>
    <button
      type="button"
      class="btn m-0 p-1 shadow-none"
    >
      <i class="fas fa-heart mr-1"
      :class="{'red-text':this.isFavoriteBy, 'animated heartBeat fast':this.gotToFavorite}"
      @click="clickFavorite" 
      />
    </button>
    <div>
      <span class="badge badge-pill badge-success">いいね {{ countFavorites }}</span>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      initialIsFavoriteBy: {
        type: Boolean,
        default: false,
      },
      initialCountFavorites: {
        type: Number,
        default: 0,
      },
      authorized: {
        type: Boolean,
        default: false,
      },
      endpoint: {
        type: String,
      },
    },
    data() {
      return {
        isFavoriteBy: this.initialIsFavoriteBy,
        countFavorites: this.initialCountFavorites,
        gotToFavorite: false,
      }
    },
    methods: {
      clickFavorite() {
        if (!this.authorized) {
          alert('いいね機能はログイン中のみ使用できます')
          return
        }

        this.isFavoriteBy
          ? this.unfavorite()
          : this.favorite()
      },
      async favorite() {
        const response = await axios.put(this.endpoint)

        this.isFavoriteBy = true
        this.countFavorites = response.data.countFavorites
        this.gotToFavorite = true
      },
      async unfavorite() {
        const response = await axios.delete(this.endpoint)

        this.isFavoriteBy = false
        this.countFavorites = response.data.countFavorites
        this.gotToFavorite = false
      },
    },
  }
</script>