import './bootstrap'
import Vue from 'vue'
import SongFavorite from './components/SongFavorite'
import FollowButton from './components/FollowButton'

const app = new Vue({
  el: '#app',
  components: {
    SongFavorite,
    FollowButton,
  }
})
