/* eslint-disable */
export default {
  data () {
    return {
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
        }]
      }
    }
  }
}
