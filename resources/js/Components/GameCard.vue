<template>
    <div class="mb-2 p-4 bg-white rounded shadow-md">
      <p><strong>White:</strong> {{ game.player_white.name }}</p>
      <p><strong>Black:</strong> {{ game.player_black.name }}</p>
      <p><strong>Tournament:</strong> {{ game.tournament?.name || 'Casual Game' }}</p>
      <p><strong>Date:</strong> {{ game.date }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      game: Object,
    },
  }
  </script>
  