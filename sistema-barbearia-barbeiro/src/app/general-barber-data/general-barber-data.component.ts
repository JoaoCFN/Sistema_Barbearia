import { Component, OnInit } from '@angular/core';
import { faHome } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-general-barber-data',
  templateUrl: './general-barber-data.component.html',
  styleUrls: ['./general-barber-data.component.css']
})
export class GeneralBarberDataComponent implements OnInit {
  faHome = faHome
  constructor() { }

  ngOnInit(): void {
  }

}
