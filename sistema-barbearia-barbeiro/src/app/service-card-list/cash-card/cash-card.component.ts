import { Component, OnInit } from '@angular/core';
import { faMoneyBillWave } from '@fortawesome/free-solid-svg-icons';
import { ChartDataSets, ChartOptions } from 'chart.js';
import { Color, Label } from 'ng2-charts';


@Component({
  selector: 'app-cash-card',
  templateUrl: './cash-card.component.html',
  styleUrls: ['./cash-card.component.css']
})
export class CashCardComponent implements OnInit {
  faMoneyBillWave = faMoneyBillWave

  public lineChartData: ChartDataSets[] = [
    { data: [400, 433, 322, 558, 446, 785, 223], label: 'Mês' },
  ];
  public lineChartLabels: Label[] = ['01','02','03','04','05','06','07'];

public lineChartOptions: ChartOptions = {
  legend: {
    display:false
  },
responsive:true,
tooltips:{
  callbacks:{
    label: tooltipItem => `${tooltipItem.yLabel}: ${tooltipItem.xLabel}`,
    title: () => null,
  }
}
}

  public lineChartColors: Color[] = [
    {
      borderColor: '#FFC107',
      backgroundColor: '#79bff2',
    },
  ];
  public lineChartLegend = true;
  public lineChartType = 'line';
  public lineChartPlugins = [];


  constructor() { }

  ngOnInit(): void {
  }

}
