import { Component, Input, OnInit } from '@angular/core';
import { faCalendarAlt, faClock } from '@fortawesome/free-solid-svg-icons';
import { Cliente } from '../model/cliente';
import { ServicoTO } from '../model/sevico';

@Component({
  selector: 'app-schedule',
  templateUrl: './schedule.component.html',
  styleUrls: ['./schedule.component.css'],
})
export class ScheduleComponent implements OnInit {
  faCalendar = faCalendarAlt;
  faClock = faClock;
  rows = [
    { name: 'Austin', gender: 'Male', company: 'Swimlane' },
    { name: 'Dany', gender: 'Male', company: 'KFC' },
    { name: 'Molly', gender: 'Female', company: 'Burger King' }
  ];

  @Input() cliente: Cliente[];
  barba_cabalo: ServicoTO = new ServicoTO(1, 'Barba e cabelo', 30, 30);
  cabelo: ServicoTO = new ServicoTO(1, 'Cabelo', 20, 30);
  barba: ServicoTO = new ServicoTO(1, 'Barba', 10, 30);

  columns = [{ prop: 'name' }, { name: 'Gender' }, { name: 'Company' }];

  constructor() {}

  ngOnInit(): void {
    this.cliente = [
      new Cliente(1, 'Rafael', 23, this.barba_cabalo),
      new Cliente(2, 'Joao', 23, this.barba),
      new Cliente(3, 'Genivaldo', 23, this.barba),
      new Cliente(4, 'Eliabe', 23, this.cabelo),
      new Cliente(5, 'Eduardo', 23, this.barba_cabalo),
      new Cliente(6, 'Ali', 23, this.barba_cabalo),
      new Cliente(7, 'Esse', 23, this.barba),
    ];



/*

    for (let i = 0; i < this.cliente.length; i++) {
      this.rows.push({id: this.cliente[i],nome: })
    }*/
  }

  dtOptions: DataTables.Settings = {
    scrollCollapse: true,
    scrollX: true,
    responsive: true,
    language: {
      url:
        'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json',
    },
  };
}
