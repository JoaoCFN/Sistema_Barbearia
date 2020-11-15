import { Component, OnInit } from '@angular/core';
import { faCalendarAlt,faEye } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-service-card-list',
  templateUrl: './service-card-list.component.html',
  styleUrls: ['./service-card-list.component.css']
})
export class ServiceCardListComponent implements OnInit {
  faCalendarAlt = faCalendarAlt
  faEye = faEye
  constructor() { }

  ngOnInit(): void {
  }

}
