var app = new Vue({

  el: '#app',
  data: {

    num_results: 5,
    num_results_home: 3,
    pag: 1,

    //defaults
    titles: 'Home',

    //usuarios
    usuarios: {},
    filer_usuario: [],
    id_usuario: null,
    nombre_usuario: null,
    mail_usuario: null,
    password_usuario: null,
    estado_usuario: null,

    //about
    about: {},
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
    etiquetas_blog: null,

    //clinetes
    clientes: {},
    filter_clientes: [],
    id_cliente: null,
    titulo_cliente: null,
    detalle_cliente: null,
    url_imagen: null,
    imagen_clinete: null,
    estado_cliente: null,

    //comentarios
    comments: {},
    id_comentario: null,
    cliente: null,
    comentario: null,
    fecha_comentario: null,
    estado_comentario: null,



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

    //cantidad de mensajes
    cantidad_mensajes: 0,
    //mensajes
    mensajes: {},


  },

  mounted: function () {

    this.ListadoPost();
    this.ListadoAbout();
    this.ListadoComments();
    this.CountMensajes();

  },

  computed: {


  },

  methods: {

    // funcion que  agrega los titulos al card de cabecera
    SetTitles: function(text){
        app.titles = text;
    },

    //**************************************************/
    // funtions login
    //*************************************************/

    login: function () {

      axios({
        method: 'POST',
        url: '/rae/config/control/LoginController.php',
        data: {
          str_mail_user: app.mail_usuario,
          str_password_user: app.password_usuario,
        }

      }).then(function (response) {

        // handle success
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
    // functions blog
    //*************************************************/
    GrabarPost () {

      axios({
        method: 'POST',
        url: '/rae/config/control/NewPostController.php',
        data: {

             str_titulo_blog: app.titulo_blog,
             str_detalle_blog: app.detalle_blog,
             str_etiquetas_blog: app.etiquetas_blog,

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

    ListadoPost () {
        axios.get('/rae/config/control/ListPostController.php', {}).then(function (response) {
            app.posts = response.data;
        });
    },

    EliminarPost (id) {

        Swal.fire({
            title: "¿Estas seguro de Eliminar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                axios({
                    method: 'POST',
                    url: '/rae/config/control/DeletePostController.php',
                    data: {

                        int_id: id
                    }
                }).then(function (response) {
                    console.log(response.data);
                    if(response.data == true){

                        app.Toast.fire({
                            icon: 'success',
                            title: 'Datos eliminados correctamente'
                        })

                    }else{

                        app.Toast.fire({
                            icon: 'error',
                            title: 'Error al eliminar los datos'
                        })

                    }
                });
            }
        })

        // actualiza la tabla
        app.ListadoPost();

    },

    CambiarEstadoPost (id) {

        Swal.fire({
            title: "¿Estas seguro de cambiar el estado?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                axios({
                    method: 'POST',
                    url: '/rae/config/control/UpdateState.php',
                    data: {

                        int_id: id
                    }
                }).then(function (response) {
                    console.log(response.data);
                    if(response.data == true){

                        app.Toast.fire({
                            icon: 'success',
                            title: 'Datos eliminados correctamente'
                        })

                    }else{

                        app.Toast.fire({
                            icon: 'error',
                            title: 'Error al eliminar los datos'
                        })

                    }
                });
            }
        })

        // actualiza la tabla
        app.ListadoPost();

    },
    //**************************************************/
    // functions about
    //*************************************************/
    GrabarAbout () {

        axios({
            method: 'POST',
            url: '/rae/config/control/NewAboutController.php',
            data: {

                str_titulo_about: app.titulo_quienes_somos,
                str_detalle_about: app.detalle_quienes_somos,

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

    ListadoAbout() {
        axios.get('/rae/config/control/ListadoAboutController.php', {}).then(function (response) {
            app.about = response.data;
        });
    },

    EliminarAbout (id) {

        Swal.fire({
            title: "¿Estas seguro de Eliminar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                axios({
                    method: 'POST',
                    url: '/rae/config/control/DeleteAboutController.php',
                    data: {

                        int_id: id
                    }
                }).then(function (response) {
                    console.log(response.data);
                    if(response.data == true){

                        app.Toast.fire({
                            icon: 'success',
                            title: 'Datos eliminados correctamente'
                        })

                    }else{

                        app.Toast.fire({
                            icon: 'error',
                            title: 'Error al eliminar los datos'
                        })

                    }
                });
            }
        })

        // actualiza la tabla
        app.ListadoAbout();

    },

    CambiarEstadoAbout (id) {

        Swal.fire({
            title: "¿Estas seguro de cambiar el estado?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                axios({
                    method: 'POST',
                    url: '/rae/config/control/UpdateState.php',
                    data: {

                        int_id: id
                    }
                }).then(function (response) {
                    console.log(response.data);
                    if(response.data == true){

                        app.Toast.fire({
                            icon: 'success',
                            title: 'El estado fue actualizado correctamente'
                        })

                    }else{

                        app.Toast.fire({
                            icon: 'error',
                            title: 'Error al actualizar estado'
                        })

                    }
                });
            }
        })

        // actualiza la tabla
        app.ListadoPost();

    },

    //**************************************************/
    // functions Comments
    //*************************************************/
    GrabarComments () {

        axios({
            method: 'POST',
            url: '/rae/config/control/NewCommentsController.php',
            data: {

                str_cliente: app.cliente,
                str_comentario: app.comentario,

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

    ListadoComments() {
        axios.get('/rae/config/control/ListadoCommentsController.php', {}).then(function (response) {
            app.comments = response.data;
        });
    },

    EliminarComments (id) {

        Swal.fire({
            title: "¿Estas seguro de Eliminar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                axios({
                    method: 'POST',
                    url: '/rae/config/control/DeleteCommentsController.php',
                    data: {

                        int_id: id
                    }
                }).then(function (response) {
                    console.log(response.data);
                    if(response.data == true){

                        app.Toast.fire({
                            icon: 'success',
                            title: 'Datos eliminados correctamente'
                        })

                    }else{

                        app.Toast.fire({
                            icon: 'error',
                            title: 'Error al eliminar los datos'
                        })

                    }
                });
            }
        })

        // actualiza la tabla
        app.ListadoComments();

    },

    CambiarEstadoComments (id) {

        Swal.fire({
            title: "¿Estas seguro de cambiar el estado?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                axios({
                    method: 'POST',
                    url: '/rae/config/control/UpdateState.php',
                    data: {

                        int_id: id
                    }
                }).then(function (response) {
                    console.log(response.data);
                    if(response.data == true){

                        app.Toast.fire({
                            icon: 'success',
                            title: 'El estado fue actualizado correctamente'
                        })

                    }else{

                        app.Toast.fire({
                            icon: 'error',
                            title: 'Error al actualizar estado'
                        })

                    }
                });
            }
        })

        // actualiza la tabla
        app.ListadoPost();

    },

    //**************************************************/
    // functions Messages
    //*************************************************/
    ListadoMensajes() {
        axios.get('/rae/config/control/ListMensajesController.php', {}).then(function (response) {
            app.mensajes = response.data;
        });
    },

    CountMensajes() {
        axios.get('/rae/config/control/CountMensajesController.php', {}).then(function (response) {

            var data;
            data = response.data

            data.forEach(function (elemento) {
                app.cantidad_mensajes = elemento.cantidad_mensajes;
            });

        });
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

      if (!this.titulo_blog_error && this.detalle_blog_error) {
        GrabarPost();
      }

    },

    validEmail: function (email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

  }

})
