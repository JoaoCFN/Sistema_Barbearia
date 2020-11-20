import { Component, OnInit } from '@angular/core';
import { faCamera, faCut, faPencilAlt } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-barbershop-profile',
  templateUrl: './barbershop-profile.component.html',
  styleUrls: ['./barbershop-profile.component.css']
})
export class BarbershopProfileComponent implements OnInit {

  constructor() { }
  faCut = faCut;
  faPencilAlt = faPencilAlt
  faCamera = faCamera
  isEdit : boolean = true


  isEditing(){
    if (this.isEdit){
      this.isEdit = false
      console.log (this.isEdit)
    }else{
      this.isEdit = true
      console.log (this.isEdit)
    }
  }

  ngOnInit(): void {
  }

}
