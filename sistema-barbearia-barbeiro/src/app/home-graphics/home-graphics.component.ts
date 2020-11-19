import { BasicGraphics } from './../model/basic-graphics';
import { Component, OnInit, ViewChild, Input } from '@angular/core';
import { ChartDataSets, ChartOptions, ChartType } from 'chart.js';
import { BaseChartDirective, Color, Label } from 'ng2-charts';
import {
  faCut,
  faClock,
  faMoneyBillWave,
} from '@fortawesome/free-solid-svg-icons';

@Component({
  selector: 'app-home-graphics',
  templateUrl: './home-graphics.component.html',
  styleUrls: ['./home-graphics.component.css'],
})
export class HomeGraphicsComponent implements OnInit {
  faCut = faCut;
  faClock = faClock;
  faMoneyBillWave = faMoneyBillWave;
  @Input() basicGraphic: BasicGraphics = (null);

  constructor() { }



  public lineChartData: ChartDataSets[] = [
    {
      data:this.basicGraphic.data,
      label: 'Quantidade Serviços',
      yAxisID: 'y-axis-1',
    },
  ];
  public lineChartLabels: Label[] = [
    this.basicGraphic.label,
  ];
  public lineChartOptions: ChartOptions & { annotation: any } = {
    responsive: true,
    scales: {
      // We use this empty structure as a placeholder for dynamic theming.
      xAxes: [
        {
          ticks: {
            fontColor: 'white',
            fontStyle: 'normal',
          },
        },
      ],
      yAxes: [
        {
          //display: false,
          id: 'y-axis-0',
          position: 'left',
          ticks: {
            fontColor: 'white',
          },
        },
        {
          display: false,
          id: 'y-axis-1',
          position: 'right',
          gridLines: {
            color: 'white',
          },
          ticks: {
            fontColor: 'red',
          },
        },
      ],
    },
    annotation: {
      annotations: [
        {
          type: 'line',
          mode: 'vertical',
          scaleID: 'x-axis-0',
          value: 'March',
          borderColor: 'orange',
          borderWidth: 2,
          label: {
            enabled: true,
            fontColor: 'orange',
            content: 'LineAnno',
          },
        },
      ],
    },
  };

  public lineChartColors: Color[] = [
    /*{ // grey
      backgroundColor: 'rgba(148,159,177,0.2)',
      borderColor: 'rgba(148,159,177,1)',
      pointBackgroundColor: 'rgba(148,159,177,1)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgba(148,159,177,0.8)'
    },
    { // dark grey
      backgroundColor: 'rgba(77,83,96,0.2)',
      borderColor: 'rgba(77,83,96,1)',
      pointBackgroundColor: 'rgba(77,83,96,1)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgba(77,83,96,1)'
    },
    { // red
      backgroundColor: 'rgba(255,0,0,0.3)',
      borderColor: 'red',
      pointBackgroundColor: 'rgba(148,159,177,1)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgba(148,159,177,0.8)'
    },*/
    {
      //green
      //backgroundColor: '#43A047',
      borderColor: 'white',
      pointBackgroundColor: 'white',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgba(148,159,177,0.8)',
    },
  ];
  public lineChartLegend = false;
  public lineChartType: ChartType = 'line';
  //public lineChartPlugins = [pluginAnnotations];

  // events
  public chartClicked({
    event,
    active,
  }: {
    event: MouseEvent;
    active: {}[];
  }): void {
    console.log(event, active);
  }

  public chartHovered({
    event,
    active,
  }: {
    event: MouseEvent;
    active: {}[];
  }): void {
    console.log(event, active);
  }

  @ViewChild(BaseChartDirective, { static: true }) chart: BaseChartDirective;

  ngOnInit(): void { }
}
