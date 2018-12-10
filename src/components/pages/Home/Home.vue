<style>
  @import url("./index.css");
</style>
<template>
  <div class="home">
    <div class="menu-container">
      <div class="menu-wrap">
        <div class="menu-content">
          <div class="menu-form">
            <h2 class='header'>Як це працює?</h2>
            <div class="entry">
              <div class="entry-item">
                <img src="../../../assets/images/book.png" alt="">
                Ст. 40 Конституції України та Закон України про звернення громадян дають можливість звертатись до ДАІ
                зі
                скаргами, які вона зобов'язана розглянути протягом 30 днів, встановити особу порушника та покарати
                його.
              </div>
              <div class="entry-item">
                <img src="../../../assets/images/oficer.png" alt="">
                Навіть якщо ДАІ не випише штраф, а лише проведе профілактичну бесіду з власником автомобіля,
                наступного
                разу він двічі подумає, чи не створює його автівка перешкод для руху або псує газон.
              </div>
            </div>
            <div class="menu-manual">
              <h3>Як оформити скаргу?</h3>
              <div class="menu-manual-items">
                <div class="menu-manual-item">
                  <img src="../../../assets/images/camera.png" alt="">
                  <h4>Сфотографувати автомобіль</h4>
                  Зробіть кілька фотографій правопорушення так, щоб було чітко видно місцевість, дорожні знаки або
                  розмітку.
                </div>
                <div class="menu-manual-item">
                  <img src="../../../assets/images/form.png" alt="">
                  <h4>Заповнити форму</h4>
                  Вкажіть місто, адресу, дату правопорушення, номерні знаки автомобіля, додайте фотографії.
                </div>
                <div class="menu-manual-item">
                  <img src="../../../assets/images/send.png" alt="">
                  <h4>Надіслати скаргу</h4>
                  Натисніть кнопку "Надіслати", для того щоб ваша скарга потрапила до управління ДАІ.
                </div>
              </div>
              <transition name="fade">
                <div class="menu-manual-item" v-if="form === false">
                  <button class="menu-button" id="formshow" v-on:click="initMap();">Оформити скаргу</button>
                </div>
              </transition>
            </div>
            <transition name="fade">

              <div class="form-wrapper" v-if="form === true">
                <v-form id="uploadForm" class="form">
                  <h2 style="padding: 5px">Заповніть всі поля</h2>
                  <v-text-field label="ПIБ" v-model="claim.fio" prepend-icon="face" :rules="rules.fio" required color="light-blue lighten-1">
                  </v-text-field>

                  <!-- <v-text-field label="Прописка" v-model="claim.place" prepend-icon="account_box" :rules="rules.general"
                    required color="light-blue lighten-1">
                  </v-text-field> -->

                  <v-text-field label="Номер телефону" v-model="claim.phone" prepend-icon="phone" :rules="rules.phone"
                    required color="light-blue lighten-1" mask="(###) ### ## ##">
                  </v-text-field>

                  <v-text-field label="E-mail" v-model="claim.email" prepend-icon="email" :rules="rules.email" required
                    color="light-blue lighten-1">
                  </v-text-field>

                  <v-text-field label="Номер авто" v-model="claim.numbers" prepend-icon="directions_car" :rules="rules.general"
                    required color="light-blue lighten-1">
                  </v-text-field>

                  <h3 style="padding: 5px">Відзначте на карті мiсце порушення</h3>

                  <div id="map"></div>

                  <input type="file" id="file" ref="file" v-on:change="addFile" multiple />

                  <div id="galery">
                    <div class="galery-item" v-for="(item, index) in url" v-if="url">
                      <div class="cross" v-on:click="remove(index)">&#10006;</div>
                      <img :src="url[index]" style="width: 100%; height: 100%;">
                    </div>
                  </div>

                  <v-btn block color="light-blue lighten-1" @click.native="send()">Вiдправити</v-btn>
                </v-form>

              </div>
            </transition>
            <v-snackbar timeout="6000" bottom="bottom" :color="color" v-model="snackbar" >
              {{ message }}
            </v-snackbar>
          </div>

          <div class="rules">

            <h2>Правила користування</h2>
            <p>Цей сервіс працює тільки у місті Запоріжжя</p>
            <p> Сервіс NAME призначено для створення скарг до Державної автомобільної інспекції України на
              дії водіїв автомобілів, які, на думку користувача сервісу, порушують Правила дорожнього руху, зокрема,
              у
              частині зупинки/стоянки транспортних засобів.
            </p>
            <p>ДАІ не розглядатиме скаргу, подану анонімно, тому
              Ваші ПІБ є обов'язковими.
              Адреса для листування потрібна для отримання відповіді від інспектора ДАІ, який розглядатиме Вашу
              скаргу,
              а телефон може бути використаний інспектором для уточнення у Вас деталей справи.
            </p>
            <p>Вашу скарга відправляеться автоматично на поштову адресу zaporizhzhya@patrol.police.gov.ua Управління
              патрульної поліції у Запорізькій області, тому просимо вказувати ваші реальні данні!
            </p>
            <p>Ваші персональні дані будуть використовуватись лише для заповнення форми заявки та в жодному разі не
              будуть надані стороннім особам чи опубліковані на сайті.
            </p>
            <p>Заявка може оброблятися до 30 робочих діб.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>
<script>
  import Axios from 'axios'

  /* eslint-disable */
  export default {
    name: 'Home',
    metaInfo: {
      title: 'My Awesome Webapp',
      // override the parent template and just use the above title only
      titleTemplate: null
    },
    data() {
      return {
        response: '',
        map: {},
        marker: {},
        lat: "",
        lng: "",
        url: [],
        form: false,
        snackbar: false,
        color: 'red',
        claim: {
          fio: '',
          phone: '',
          email: '',
          numbers: '',
          cords: null,
          upFiles: [],
        },
        message: '',
        rules: {
          general: [(value) => !!value || 'Це поле обовязкове'],
          email: [value => {
            if (!!value) {
              return /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'Введіть вірний email'
            } else {
              return 'Це поле обовязкове'
            }
          }],
          phone: [value => {
            if (!!value) {
              return value.length > 9 || 'Введіть вірний номер телефону'
            } else {
              return 'Це поле обовязкове'
            }
          }],
          fio: [value => {
            if (!!value) {
              return /[А-Яа-яЁёІіЇїЄє]+$/.test(value) || 'Введіть правильно ПIБ'
            } else {
              return 'Це поле обовязкове'
            }
          }],
          numbers: [value => {
            if (!!value) {
              return /[А-Я]{2}[0-9]{4}[А-Я]{2}/.test(value) || 'Введіть правильно номер авто'
            } else {
              return 'Це поле обовязкове'
            }
          }]
        }
      }
    },
    methods: {
      initMap() {
        this.form = !this.form;

        this.$nextTick().then(() => {

          this.map = new google.maps.Map(document.getElementById('map'), {
            center: {
              lat: 47.839160,
              lng: 35.140104
            },
            zoom: 13
          });

          this.marker = new google.maps.Marker({
            position: {
              lat: 47.839160,
              lng: 35.140104
            },
            map: this.map
          });

          this.map.addListener('click', (event) => {
            var latLng = event.latLng
            this.lat = latLng.lat()
            this.lng = latLng.lng()
            this.marker.setPosition(latLng)
            this.claim.cords = true;
          });

        })

      },
      remove(index) {
        this.url.splice(index, 1)
        this.claim.upFiles.splice(index, 1)
      },
      send() {
        if (!!this.claim.fio && !!this.claim.phone && !!this.claim.email && !!this.claim.numbers &&
          !!this.claim.cords) {
          var data = new FormData();
          data.append('fio', this.claim.fio)
          data.append('phone', this.claim.phone)
          data.append('email', this.claim.email)
          data.append('numbers', this.claim.numbers)
          data.append('lat', this.lat)
          data.append('lng', this.lng)

          for (var i = 0; i < this.claim.upFiles.length; i++) {
            data.append('file[' + i + ']', this.claim.upFiles[i])
          }

          Axios.post(`http://loc.gopua.xyz/claim/create`, data)
            .then(data => {
              this.response = data.statusText
              if (this.response == "Created"){
              this.color = 'success'
              this.snackbar = true
              this.message = "Заявка створена"              
            } else {
              this.color = "error"
              this.snackbar = true
              this.message = "Помилка, спробуйте пiзнiше"
            }
            })           
        } else {
          this.color = "error"
          this.snackbar = true
          this.message = 'Заповніть всі поля'
        }
      },
      addFile() {
        var length = 6 - this.claim.upFiles.length;
        if (this.claim.upFiles.length < 6) {
          if (this.$refs.file.files.length <= length) {
            for (var i = 0; i < length; i++) {
              this.url.push(URL.createObjectURL(this.$refs.file.files[i]))
              this.claim.upFiles.push(this.$refs.file.files[i])
            }
            return
          }
        }
        this.color = "error"
        this.snackbar = true
        this.message = 'максимум 6 фото'
      },
    },
    mounted: function () {

    }

  }
    // ,({
    //           data: {
    //             token
    //           }              
    //         }) => {

    //           // if (redirect) router.push(redirect)
    //         }).catch(({
    //           response: {
    //             data
    //           }
    //         }) => {
    //           console.log(data)
    //           this.snackbar = true
    //           this.message = response.data.message
    //         }
</script>