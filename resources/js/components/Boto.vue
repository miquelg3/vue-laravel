<template>
<!-- Llistem els marcadors -->
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
      <template v-for="post in posts" :key="post.id">
        <div v-if="post.propietari == user_auth" class="col" style="display: inline">
          <div class="col" style="display: inline">
            <a  v-bind:href="post.linkweb" data-toggle="tooltip" data-placement="top" v-bind:title="post.nom" style="text-decoration: none">
              <span class="bi bi-square" v-bind:style="{backgroundImage: 'url(' + post.linkimage + ')'}"  style="background-align: center; background-repeat: no-repeat; font-size:80px; background-size: 78px 70px; background-position-y: 21px; background-position-x: 1px"></span>
            </a>
            <br>
          </div>
        </div>
      </template>
    </div>
  </div>
<!-- Creem el boto -->
  <button type="button" class="btn btn-primary" @click="modal.show()">
    Añadir nuevo
  </button>
  <div class="modal fade" ref="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Añadir nuevo</h5>
          <button type="button" class="btn-close" @click="modal.hide()" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nom:</label>
                    <input type="text" class="form-control" id="nom" v-model="crearNuevo.nom" required="">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label" >Url web:</label>
                    <input type="text" class="form-control" id="linkweb" v-model="crearNuevo.linkweb" required="">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Url imagen:</label>
                    <input type="text" class="form-control" id="linkimage" v-model="crearNuevo.linkimage" required="">
                </div>
                <!-- <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Propietari:</label>
                    <input type="text" class="form-control" id="propietari" v-model="crearNuevo.propietari" required="">
                </div> -->
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="modal.hide()">Close</button>
          <button type="button" class="btn btn-primary"  @click.prevent="crear" @click="modal.hide()">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// Axios per a passar el post, que en routes será declarat, i posteriorment en HomeControllers especificat

import { Modal } from 'bootstrap'
import { Tooltip } from "bootstrap";
import swal from 'sweetalert'

new Tooltip(document.body, {
  selector: "[data-bs-toggle='tooltip']",
});

export default {
  props:['user_auth'],
  name: "App",
  data: () => ({
    posts: [],
    crearNuevo: {nom: '', linkweb: '', linkimage: ''}
  }),
  mounted() {
    this.getPost()
    this.modal = new Modal(this.$refs.exampleModal)
  },
  methods: {
    getPost(){
      axios.get('listar_posts').then(res=> {
        this.posts = res.data;
      })
    },
    crear(){
      axios.post('crear_nueva', this.crearNuevo).then(res=> {
        this.nueva = res.data;
        // swal("¡Felicidades!", "Nuevo marcador añadido correctamente", "success");
        // window.location.reload();
        swal({title: "¡Felicidades!", text: "Nuevo marcador añadido correctamente", type: 
        "success"}).then(function(){ 
          location.reload();
        }
        );
      }).catch(function (error){
        swal("¡Error!", "Algo ha salido mal", "error");
      });
    }
  }
};
</script>