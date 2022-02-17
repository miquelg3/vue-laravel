<template>
<!-- Llistem els marcadors -->
  <div class="container">
    <div v-if="!editar" class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-xl-4">
      <template v-for="post in posts" :key="post.id">
        <div  class="col" style="display: inline; width: 50%">
          <div class="col" style="display: inline">
            <!-- Marcador -->
            <a v-bind:href="post.linkweb" v-bind:title="post.nom" style="text-decoration: none">
              <span class="bi bi-square" v-bind:style="{backgroundImage: 'url(' + post.linkimage + ')'}"  style="background-align: center; background-repeat: no-repeat; font-size:80px; background-size: 78px 70px; background-position-y: 21px; background-position-x: 1px"></span>
            </a>
          </div>
        </div>
      </template>
    </div>
    <div v-if="editar" class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-xl-3">
      <template v-for="post in posts" :key="post.id">
        <div class="col" style="display: inline; width: 50%">
          <div class="col" style="display: inline">
            <!-- Marcador -->
            <a v-bind:href="post.linkweb" v-bind:title="post.nom" style="text-decoration: none">
              <span class="bi bi-square" v-bind:style="{backgroundImage: 'url(' + post.linkimage + ')'}"  style="background-align: center; background-repeat: no-repeat; font-size:80px; background-size: 78px 70px; background-position-y: 21px; background-position-x: 1px"></span>
            </a>
            <!-- Botó editar -->
            <button class="btn bi bi-square"  v-if="editar" @click="modalEditar(post); modal.show()" style="background-image: url(https://es.seaicons.com/wp-content/uploads/2016/09/Actions-document-edit-icon.png);text-decoration: none; padding-bottom: 60px; background-align: center; background-repeat: no-repeat; font-size:60px; background-size: 47px 50px; background-position: center; background-position-y: 28px; background-position-x: 18px">
            </button>
            <!-- Botó eliminar -->
            <button class="btn bi bi-square"  v-if="editar"  @click="eliminar(post)" style="background-image: url(https://www.iconpacks.net/icons/1/free-trash-icon-347-thumb.png);text-decoration: none; padding-bottom: 60px; background-align: center; background-repeat: no-repeat; font-size:60px; background-size: 47px 50px; background-position: center; background-position-y: 28px; background-position-x: 18px">
            </button>
          </div>
        </div>
      </template>
    </div>
  </div>
<!-- Creem el boto -->
  <button type="button" class="btn btn-primary" @click="modalCrear(); modal.show()">
    Añadir nuevo
  </button>
  <!-- Anem a gastar el mateix modal per a editar com per a crear -->
  <div class="modal fade" ref="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{titulo}}</h5>
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
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="modal.hide()">Cerrar</button>
          <button type="button" class="btn btn-primary"  v-if="btnCrear" @click.prevent="crear" @click="modal.hide()">Crear post</button>
          <button type="button" class="btn btn-primary"  v-if="btnEditar" @click.prevent="editarpost" @click="modal.hide()">Editar post</button>
        </div>
      </div>
    </div>
  </div>
  <template v-if="!editar">
    <button @click="editar = true" type="button" class="btn btn-secondary">
      Editar
    </button>
  </template>
  <template v-if="editar">
    <button @click="editar = false" type="button" class="btn btn-secondary">
      No editar
    </button>
  </template>
</template>

<script>
// Axios per a passar el post, que en routes será declarat, i posteriorment en HomeControllers especificat

import { Modal } from 'bootstrap'
import swal from 'sweetalert'
import Button from '../../../vendor/laravel/breeze/stubs/inertia-vue/resources/js/Components/Button.vue';


export default {
  components: { Button },
  // props:['user_auth'],
  name: "App",
  data: () => ({
    posts: [],
    crearNuevo: {nom: '', linkweb: '', linkimage: ''},
    editar: false,
    titulo: '',
    btnCrear: false,
    btnEditar: false,
    idPost: ''
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
    // Mètode que s'executa una vegada apretes crear post
    crear(){
      axios.post('crear_nueva', this.crearNuevo).then(res=> {
        this.nueva = res.data;
        swal({title: "¡Felicidades!", text: "Nuevo marcador añadido correctamente", icon: 
        "success"}).then(function(){ 
          location.reload();
        }
        );
      }).catch(function (error){
        swal("¡Error!", "Algo ha salido mal", "error");
      });
    },
    modalCrear(){
      this.titulo ='Crear post'
      this.btnCrear = true
      this.btnEditar = false
      this.crearNuevo = {nom: '', linkweb: '', linkimage: ''}
    },
    // Passem els datos del post seleccionat amb datospost
    modalEditar(datospost){
      this.titulo = 'Editar post'
      this.btnCrear = false
      this.btnEditar = true
      this.crearNuevo = {nom: datospost.nom, linkweb: datospost.linkweb, linkimage: datospost.linkimage}
      this.idPost = datospost.id
    },
    // Mètode que s'executa una vegada apretes en editar post
    editarpost() {
      axios.put('editar_post/' + this.idPost, this.crearNuevo).then(res=> {
        this.nueva = res.data;
        swal({title: "¡Felicidades!", text: "Editado correctamente", icon: 
        "success"}).then(function(){ 
          location.reload();
        }
        );
      }).catch(function (error){
        swal("¡Error!", "Algo ha salido mal", "error");
      });
    },
    eliminar(datospost) {
      axios.delete('eliminar_post/' + datospost.id, this.crearNuevo).then(res=> {
        this.nueva = res.data;
        swal({title: "¡Felicidades!", text: "Eliminado correctamente", icon: 
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