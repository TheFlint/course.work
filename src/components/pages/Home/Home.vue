<style>
  @import url("./index.css");
</style>
<template>
  <div class="home">
    <div class="menu-container">
      <div class="menu-wrap">
        <div class="menu-content">
          <!-- <div class="menu-head">
            <div class="menu-head-item">
              <a href="" class="menu-head-item-image"><img src="../../../assets/images/ico.png" alt=""></a>
              <div class="menu-btn"><span></span></div>
            </div>
            <nav class="menu-navigation">
              <ul>
                <li><a href="">Привіт, NAME</a></li>
                <li><a href="">Мої скарги</a></li>
                <li><a href="">Залишити скаргу</a></li>
              </ul>
            </nav>
            </div> -->
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
              <div class="menu-manual-item">
                <button class="menu-button" id="formshow" v-on:click="form = !form">Оформити скаргу</button>
              </div>
              <transition name="fade">
                <div class="form-wrapper" v-if="form === true">
                  <hr>
                  <v-form id="uploadForm" class="form">
                    <v-text-field label="ПЫБ" v-model="claim.fio" prepend-icon="account_box" :rules="rules.fio"
                      required color="light-blue lighten-1">
                    </v-text-field>

                    <v-text-field label="Прописка" v-model="claim.place" prepend-icon="account_box" :rules="rules.general"
                      required color="light-blue lighten-1">
                    </v-text-field>

                    <v-text-field label="Номер телефону" v-model="claim.phone" prepend-icon="account_box" :rules="rules.phone"
                      required color="light-blue lighten-1" mask="(###) ### ## ##">
                    </v-text-field>

                    <v-text-field label="E-mail" v-model="claim.email" prepend-icon="account_box" :rules="rules.email"
                      required color="light-blue lighten-1">
                    </v-text-field>

                    <v-text-field label="Номер авто" v-model="claim.numbers" prepend-icon="account_box" :rules="rules.general"
                      required color="light-blue lighten-1">
                    </v-text-field>

                    <input type="file" id="file" ref="file" v-on:change="addFile()" />

                    <v-btn block color="light-blue lighten-1" @click.native="send()">Выдправити</v-btn>

                  </v-form>

                </div>
              </transition>
            </div>

            <v-snackbar timeout="6000" bottom="bottom" color="red lighten-1" v-model="snackbar">
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
            <p> Для подання скарги Вам необхідно зареєструватися. ДАІ не розглядатиме скаргу, подану анонімно, тому
              Ваші П.І.Б. є обов'язковими.
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
  export default {
    name: 'Home',
    metaInfo: {
      title: 'My Awesome Webapp',
      // override the parent template and just use the above title only
      titleTemplate: null
    },
    data() {
      return {
        form: false,
        snackbar: false,
        rules: {
          general: [(value) => !!value || 'Це поле обовязкове'],
          email: [value => {
            if (!!value) {
              return /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(value) || 'Введите верный email'
            } else {
              return 'Це поле обовязкове'
            }
          }],
          phone: [value => {
            if (!!value) {
              return value.length > 9 || 'Введите верный номер телефона'
            } else {
              return 'Це поле обовязкове'
            }
          }],
          fio: [value => {
            if (!!value) {
              return /[А-Яа-яЁёІіЇїЄє]+$/.test(value) || 'Введите верный fio'
            } else {
              return 'Це поле обовязкове'
            }
          }],
          numbers: [value => {
            if (!!value) {
              return /[А-Я]{2}[0-9]{4}[А-Я]{2}/.test(value) || 'Введите верно номер авто'
            } else {
              return 'Це поле обовязкове'
            }
          }],
        },

        claim: {
          fio: '',
          place: '',
          phone: '',
          email: '',
          numbers: '',
          cords: '',
          upFiles: []
        },
        message: ''
      }
    },
    methods: {
      send() {
        if (!!this.claim.fio && !!this.claim.place && !!this.claim.phone && !!this.claim.email && !!this.claim.numbers &&
          !!this.claim.cords) {

        } else {
          this.snackbar = true
          this.message = 'Заполните все поля'
        }
      },
      addFile() {
        this.file = this.$refs.file.files[0];

        console.log('>>>> 1st element in files array >>>> ', this.file);

        // if (this.$refs.pictureInput.file) {
        //   this.files.pop(this.$refs.pictureInput.file);
        // } else {
        //   console.log("Old browser. No support for Filereader API");
        // }
      },
      // krya() {
      //   console.log('-----------------------')
      //   var f = window.getElementById('uploadForm');
      //   f.hide();

      //   // $(document).ready(function () {
      //   //   $("formshow").click(function () {
      //   //     $("#uploadForm").toggle(500);
      //   //   });
      //   // });
      //   // $(document).ready(function(){
      //   //     $("#carsjq").click(function(){
      //   //         $("#getauto").toggle(500);
      //   //     });
      //   // });
      // },
      // onChanged() {
      //   console.log("New picture loaded");
      //   if (this.$refs.pictureInput.file) {
      //     this.image = this.$refs.pictureInput.file;
      //   } else {
      //     console.log("Old browser. No support for Filereader API");
      //   }
      // },
      // onRemoved() {
      //   this.image = '';
      // },
      // attemptUpload() {
      //   if (this.image) {
      //     FormDataPost('http://localhost:8001/user/picture', this.image)
      //       .then(response => {
      //         if (response.data.success) {
      //           this.image = '';
      //           console.log("Image uploaded successfully ✨");
      //         }
      //       })
      //       .catch(err => {
      //         console.error(err);
      //       });
      //   }
      // }
    },


  }
</script>
