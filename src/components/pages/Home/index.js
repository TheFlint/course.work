/* eslint-disable */
export default {
    data() {
        return {
            url: null,
            form: false,
            snackbar: false,
            claim: {
                fio: '',
                place: '',
                phone: '',
                email: '',
                numbers: '',
                cords: '',
                upFiles: null,
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
            for (var i = 0; i < this.$refs.file.files.length - 1; i++) {

            }


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
