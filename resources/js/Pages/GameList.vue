<template>
    <MainLayout>
      <h2 class="text-xl font-bold mb-4">Games</h2>
      <GameCard v-for="game in games" :key="game.id" :game="game" />
    </MainLayout>
  </template>
  
  <script>
  import MainLayout from '@/Layouts/MainLayout.vue'
  import GameCard from '@/Components/GameCard.vue'
  
  export default {
    components: { MainLayout, GameCard },
    props: {
      games: Array,
    },
  }
  </script>
  