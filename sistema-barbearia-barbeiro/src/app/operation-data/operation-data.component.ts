import {Component, ElementRef, ViewChild,OnInit} from '@angular/core';
import {FormBuilder, FormControl, FormGroup} from '@angular/forms';
import { faCogs, faPencilAlt } from '@fortawesome/free-solid-svg-icons';
import {Observable} from 'rxjs';

export interface dias_semana {
  dia: string;
  trabalha: boolean
}

@Component({
  selector: 'app-operation-data',
  templateUrl: './operation-data.component.html',
  styleUrls: ['./operation-data.component.css']
})
export class OperationDataComponent {
  faCogs = faCogs
  segunda  = false;
  faPencilAlt = faPencilAlt
  teste : string = ''

isEdit : boolean = true

 dias:dias_semana[] = [
    {dia: 'Segunda-Feira',trabalha:false},
    {dia: 'Terça-Feira' ,trabalha:false},
    {dia: 'Quarta-Feira',trabalha:false},
    {dia: 'Quinta-Feira',trabalha:false},
    {dia: 'Sexta-Feira',trabalha:false},
    {dia: 'Sabado',trabalha:false},
    {dia: 'Domingo',trabalha:false},
  ]

  constructor() {
  }

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
