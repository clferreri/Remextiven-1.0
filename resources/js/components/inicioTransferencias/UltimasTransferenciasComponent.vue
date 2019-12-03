<template>
    <div class="container cajita">
        <div class="row">
            <h3 class="col-12">Ultimas transferencias</h3>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      notas: [],
      modoEditar: false,
      nota: {nombre: '', descripcion: ''}
    }
  },
  created(){
    axios.get('api/jugeteando').then(res=>{
      
    })
  },
}
</script>
