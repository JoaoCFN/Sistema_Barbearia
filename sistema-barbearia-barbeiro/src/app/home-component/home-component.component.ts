import { BarbeariaService } from './../barbearia.service';
import { BasicGraphics } from './../model/basic-graphics';
import { BasicCard } from './../model/basic-card';
import { Component, OnInit } from '@angular/core';
import { faEye, faMoneyBillWave } from '@fortawesome/free-solid-svg-icons';
import { ActivatedRoute } from '@angular/router';
import { Barbearia } from '../model/barbearia';

@Component({
  selector: 'app-home-component',
  templateUrl: './home-component.component.html',
  styleUrls: ['./home-component.component.css'],
})
export class HomeComponentComponent implements OnInit {
  constructor(private route: ActivatedRoute, private barbeariaService : BarbeariaService) {}
  basicCard: BasicCard[];
  graficos: BasicGraphics[];
  uid: number;
  barbearia: Barbearia;

  ngOnInit(): void {
    this.barbeariaService.getUser(8).subscribe(console.log)
    //this.barbearia = this.barbeariaService.getUser(this.uid)
    this.route.queryParams.subscribe((queryParams: any) => {
      this.uid = queryParams['id'];
    });
    this.basicCard = [
      new BasicCard(
        'Serviços agendados para o dia',
        '42',
        'Visualizar os serviços diarios.',
        1
      ),
      new BasicCard(
        'Lucro diario',
        '85 R$',
        'Visualizar valores de todos serviços.',
        2
      ),
      new BasicCard(
        'Serviço mais requisitado',
        'Barba e cabelo',
        'Todos os serviços realizados no dia.',
        3
      ),
    ];
    this.graficos = [
      new BasicGraphics(
        'Serviços diarios',
        [
          {
            data: [65, 59, 80, 81, 56, 55, 40],
            borderWidth: 5,
            lineWidth: 5,
            pointRadius: 5,
            label: 'Serviços diarios',
          },
        ],
        [
          '08h',
          '09h',
          '10h',
          '11h',
          '12h',
          '13h',
          '14h',
          '15h',
          '16h',
          '17h',
          '18h',
        ],
        1
      ),
      new BasicGraphics(
        'Lucro mensal',
        [
          {
            data: [
              65,
              59,
              80,
              81,
              56,
              55,
              40,
              500,
              200,
              99,
              36,
              110,
              340,
              400,
              200,
              2000,
              560,
              450,
              99,
              100,
              125,
              75,
            ],
            borderWidth: 5,
            lineWidth: 5,
            pointRadius: 5,
            label: 'Lucro mensal',
          },
        ],
        [
          '01/11',
          '02/11',
          '03/11',
          '04/11',
          '05/11',
          '06/11',
          '07/11',
          '08/11',
          '09/11',
          '10/11',
          '11/11',
          '12/11',
          '13/11',
          '14/11',
          '15/11',
          '16/11',
        ],
        2
      ),
    ];
  }
}
