import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CashCardComponent } from './cash-card.component';

describe('CashCardComponent', () => {
  let component: CashCardComponent;
  let fixture: ComponentFixture<CashCardComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CashCardComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CashCardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
