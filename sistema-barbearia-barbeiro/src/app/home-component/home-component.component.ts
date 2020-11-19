import { BasicGraphics } from './../model/basic-graphics';
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
graficos : BasicGraphics[]


  ngOnInit(): void {
    this.basicCard = [
      new BasicCard('Serviços agendados para o dia','42','Visualizar os serviços diarios.',1),
      new BasicCard('Lucro diario','85 R$','Visualizar valores de todos serviços.',2),
      new BasicCard('Serviço mais requisitado','Barba e cabelo','Todos os serviços realizados no dia.',3),
    ]
this.graficos = [
  new BasicGraphics('Serviços diarios',[{ data: [65, 59, 80, 81, 56, 55, 40]}],['08h','09h','10h','11h','12h','13h','14h','15h','16h','17h','18h'],1),
  new BasicGraphics('Renda diaria',[{ data: [65, 59, 80, 81, 56, 55, 40]}],['08h','09h','10h','11h','12h','13h','14h','15h','16h','17h','18h'],2)
]


  }

}
