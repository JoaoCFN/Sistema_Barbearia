import { BasicCard } from './../model/basic-card';
import { Component, OnInit } from '@angular/core';
import { faEye, faMoneyBillWave } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-home-component',
  templateUrl: './home-component.component.html',
  styleUrls: ['./home-component.component.css']
})
export class HomeComponentComponent implements OnInit {

  constructor() { }
basicCard : BasicCard[]

  ngOnInit(): void {
    this.basicCard = [
      new BasicCard('Serviços agendados para o dia','42',faMoneyBillWave,'Visualizar os serviços diarios.',faEye),
    ]
  }

}
