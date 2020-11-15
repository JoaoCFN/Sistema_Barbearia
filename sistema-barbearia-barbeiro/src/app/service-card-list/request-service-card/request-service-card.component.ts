import { Component, OnInit } from '@angular/core';
import { faConciergeBell } from '@fortawesome/free-solid-svg-icons';
import { ChartDataSets, ChartOptions } from 'chart.js';
import { Color, Label } from 'ng2-charts';

@Component({
  selector: 'app-request-service-card',
  templateUrl: './request-service-card.component.html',
  styleUrls: ['./request-service-card.component.css']
})
export class RequestServiceCardComponent implements OnInit {


  faConciergeBell = faConciergeBell

  public lineChartData: ChartDataSets[] = [
    { data: [4200, 4354, 5422, 5648, 4546, 7285, 2233], label: 'Mês' },
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
