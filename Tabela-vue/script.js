window.app = new Vue({
    el: "#app",
    data: {
      filter: '',
      items: [ //tę tablicę wczytujemy z JSON
           { pesel: 430, first_name: 'Dickerson', last_name: 'Macdonald', klasa: '3RZ' }],
      fields:
        [
          {
            key: "pesel",
            sortable: true,
            label: "Pesel"
          },
          {
            key: "first_name",
            sortable: false,
            label: "Imię"
          },
          {
            key: "last_name",
            sortable: true,
            label: "Nazwisko"
          },
          {
            key: "klasa",
            sortable: true,
            label: "Klasa"
          },          
        ],
      choise: [{ text: 'Press DodajChoise Pls /// i delet button with this showing', value: ''}],
    },
    methods:
    {
      rowClickHandler: function (record, index) {
        axios
          .get('json_select.php')
          .then(response => this.items = response.data);
      },
      showModal() {
        this.$refs['my-modal'].show()
      },
      showDelete() {
        this.$refs['my-modal1'].show()
        axios
        .get('choise.php')
        .then(response => this.choise = response.data);
      },
      Dodaj(event) {
        event.preventDefault()
        axios
           .get('insert.php?pesel=' + this.items.pesel + '&imie=' + this.items.first_name + '&nazwisko=' + this.items.last_name + '&klasa=' + this.items.klasa)
           .then()
           this.$refs['my-modal'].hide()
      },
      Anuluj() {
        this.$refs['my-modal'].hide()
      },
      Anuluj1() {
        this.$refs['my-modal1'].hide()
      },
      Usun(){
        if (this.items.pesel === undefined){
            axios
               .get('delete.php?pesel=' + this.items.choise)
               .then(console.log(this.items.pesel), console.log(this.items.choise))
        } else {
            axios
               .get('delete.php?pesel=' + this.items.pesel)
               .then(console.log(this.items.pesel), console.log(this.items.choise))
        }
        this.$refs['my-modal1'].hide()
      }
    }
  })