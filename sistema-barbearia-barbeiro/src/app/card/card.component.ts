import { BasicCard } from './../model/basic-card';
import { Component, Input, OnInit } from '@angular/core';
import { faCheck,faEye, faMoneyBillWave,faEllipsisH,faClock } from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-card',
  templateUrl: './card.component.html',
  styleUrls: ['./card.component.css']
})


export class CardComponent implements OnInit {

  @Input() card : BasicCard

  faMoneyBillWave = faMoneyBillWave
  faEye = faEye
  faEllipsisH = faEllipsisH
  faClock=faClock
  faCheck = faCheck



  constructor() { }

  ngOnInit(): void {
  }

}
