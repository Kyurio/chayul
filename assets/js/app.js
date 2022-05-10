var app = new Vue({

  el: '#app',
  data: {

    //usuarios
    usuarios: {},
    filer_usuario: [],
    id_usuario: null, 
    nombre_usuario: null, 
    mail_usuario: null, 
    password_usuario: null, 
    estado_usuario: null, 

    //quienes somos
    quienes_somos: {},
    filer_quienes_somos: [],
    id_quienes_somos: null, 
    titulo_quienes_somos: null,
    detalle_quienes_somos: null, 
    estado_quienes_somos: null,

    //blog
    posts: {},
    filer_post: [],
    id_blog: null, 
    titulo_blog: null,
    detalle_blog: null, 
    imagen_blog: null,
    estado_blog: null,

    //clinetes
    clientes: {},
    filter_clientes: [],
    id_cliente: null,
    titulo_cliente: null, 
    detalle_cliente: null, 
    url_imagen: null, 
    imagen_clinete: null, 
    estado_cliente: null, 


    //buscadores
    buscar_cliente: null,
    buscar_post: null, 
    buscar_quienes_somos: null, 
    buscar_usuario: null,
    
    //
    // validadores de errores
    //
    nombre_usuario_error: null, 
    mail_usuario_error: null, 
    password_usuario_error: null, 
    estado_usuario_error: null, 

    titulo_blog_error: null, 
    detalle_blog_error: null, 

    // alerta
    Toast: Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    }),


  },

  mounted: function () {

  },

  computed: {

  },

  methods: {

    login: function () {

      axios({
        method: 'POST',
        url: '/rae/config/control/Login.php',
        data: {
          str_mail_user: app.mail_usuario,
          str_password_user: app.password_usuario,
        }

      }).then(function (response) {
        // handle success
        console.log(response.data);

        if(response.data == true){
          app.Toast.fire({
            icon: 'success',
            title: 'Acceso correcto'
          })

          window.location.href = "http://localhost/rae/index";

        }else{
          app.Toast.fire({
            icon: 'error',
            title: 'Datos incorrectos'
          })
        }

      }).catch(function (response) {

        console.log(response);

      });


    },

    //**************************************************/
    //  post's grabar
    //*************************************************/
    GrabarPost () {

      axios({
        method: 'POST',
        url: '/rae/config/control/NewPost.php',
        data: {

          str_titulo_blog: app.titulo_blog,
          str_detalle_blog: app.detalle_blog, 

        }

      }).then(function (response) {
        // handle success
        console.log(response.data);

        if(response.data == true){
          app.Toast.fire({
            icon: 'success',
            title: 'Acceso correcto'
          })

        }else{
          app.Toast.fire({
            icon: 'error',
            title: 'Datos incorrectos'
          })
        }

      }).catch(function (response) {

        console.log(response);

      });

      

    },

    //**************************************************/
    //  post's grabar
    //*************************************************/
    ListadoPost () {

    },
    //**************************************************/
    //  validaciones
    //*************************************************/
    checkFormLogin: function (e) {

      e.preventDefault();

      if (!this.mail_usuario) {
        this.mail_usuario_error = 'El mail es requerido';
      }else{
        this.mail_usuario_error = null;
      }
      
      if (!this.validEmail(this.mail_usuario)) {
        this.mail_usuario_error = 'Debe ingresar un mail valido';
      }else{
        this.mail_usuario_error = null;
      }

      if(!this.password_usuario){
        this.password_usuario_error = 'El password es requerido';
      }else{
        this.password_usuario_error = null;
      }

      if (!this.mail_usuario_error && !this.password_usuario_error) {
        app.login();
      }

    },

    CheckFormPost: function (e) {

      e.preventDefault();

      if (!this.titulo_blog) {
        this.titulo_blog_error = "El titulo es requerido";
      } else {
        this.titulo_blog_error = "";
      }

      if (!this.detalle_blog) {
        this.detalle_blog_error = "El detalle es requerdio";
      } else {
        this.detalle_blog_error = "";
      }

      if (!this.this.titulo_blog_error && this.detalle_blog_error) {
        GrabarPost();
      }

    },

    validEmail: function (email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

  }

})