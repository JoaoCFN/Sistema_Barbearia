import { ServicoTO } from './../model/sevico';
import { Component, OnInit } from '@angular/core';
import { faCut, faPencilAlt, faTrash, faPlus } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-service-register',
  templateUrl: './service-register.component.html',
  styleUrls: ['./service-register.component.css'],
})
export class ServiceRegisterComponent implements OnInit {
  faCut = faCut;
  faPencilAlt = faPencilAlt
  faTrash = faTrash
  faPlus = faPlus
  servicos: ServicoTO[];

  constructor() {}

  barba_cabalo: ServicoTO = new ServicoTO(1, 'Barba e cabelo', 30, 30);
  cabelo: ServicoTO = new ServicoTO(1, 'Cabelo', 20, 30);
  barba: ServicoTO = new ServicoTO(1, 'Barba', 10, 30);

  ngOnInit(): void {
    this.servicos = [
      new ServicoTO(1, 'Barba e cabelo', 30, 30),
      new ServicoTO(2, 'Cabelo', 20, 30),
      new ServicoTO(3, 'Barba', 10, 30),
    ];
  }
}
